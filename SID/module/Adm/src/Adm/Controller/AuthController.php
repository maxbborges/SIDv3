<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Adm\Controller\Configure;

class AuthController extends AbstractActionController {
	// É a redirecionado quando se digita IP:porta/auth ou alguma das paginas q é necessario login
	public function indexAction() {
		$sessao = new Container ( 'Auth' );
		// Recupera as informaçoes de configuração do facebook
		// $newFacebook = (new Configure ())->newFacebook ();
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$query = $em->createQuery('SELECT c.app_id, c.app_secret, c.default_graph_version, c.fileupload FROM Adm\Entity\Config c');
		$configFacebook = $query->getResult();

		$newFacebook = array(
			'app_id' => $configFacebook[0]['app_id'],
			'app_secret' => $configFacebook[0]['app_secret'],
			'default_graph_version' => $configFacebook[0]['default_graph_version'],
			'fileUpload' => $configFacebook[0]['fileupload']
		);
		$sessao->newFacebook = $newFacebook;
		$fb = new \Facebook\Facebook ( $newFacebook );

		$helper = $fb->getRedirectLoginHelper ();
		$permissions = [
			'email',
			'publish_actions',
			'manage_pages',
			'publish_pages'
		];

		echo $ip = $_SERVER['HTTP_HOST'];
		$loginUrl = $helper->getLoginUrl ( 'http://'.$ip.'/auth/callback', $permissions );

		$result = new ViewModel(array (
			'logar' => $loginUrl
		));
		$result->setTerminal(true);

		return $result;

	}

	public function callbackAction() {
		$sessao = new Container ( 'Auth' );
		$fb = new \Facebook\Facebook ( $sessao->newFacebook );

		$helper = $fb->getRedirectLoginHelper ();

		try {
			$accessToken = $helper->getAccessToken ('http://'.$_SERVER['HTTP_HOST'].'/auth/callback');
		} catch ( Facebook\Exceptions\FacebookResponseException $e ) {
			// When Graph returns an error

			echo 'Graph returned an error: ' . $e->getMessage ();
			exit ();
		} catch ( Facebook\Exceptions\FacebookSDKException $e ) {
			// When validation fails or other local issues

			echo 'Facebook SDK returned an error: ' . $e->getMessage ();
			exit ();
		}

		try {
			$response = $fb->get ( '/me?fields=id,name,email,first_name,last_name', $accessToken->getValue () );
		} catch ( Facebook\Exceptions\FacebookResponseException $e ) {

			echo 'ERROR: Graph ' . $e->getMessage ();
			exit ();
		} catch ( Facebook\Exceptions\FacebookSDKException $e ) {

			echo 'ERROR: validation fails ' . $e->getMessage ();
			exit ();
		}
		$me = $response->getGraphUser ();

		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$query = $em->createQuery('SELECT c.email, c.senha, c.fbId FROM Adm\Entity\Administrador c');
		$adminstradores = $query->getResult();

		for ($cont=0;$cont<count($adminstradores);$cont++){
			if($me->getProperty('email') == $adminstradores[$cont]['email'] && $me->getProperty('id') == $adminstradores[$cont]['fbId']){
				$sessao->admin = true;
				$sessao->fb_access_token = ( string ) $accessToken;
				$sessao->nome = $me->getProperty ( 'first_name' );
				$sessao->fbId = $me->getProperty ( 'id' );
				$sessao->email = $me->getProperty ( 'email' );

				return $this->redirect ()->toRoute ( 'divulgacao', array (
					'controller' => 'divulgacao',
					'action' => 'listar'
					) );
				}
				if($cont==(count($adminstradores)-1)){
					$this->redirect ()->toRoute('auth',array(
						'controller' => 'auth',
						'action' => 'index'
					));
				}
			}
		}
		public function sairAction() {
			$sessao = new Container ( "Auth" );

			$sessao->getManager ()->destroy ();

			return $this->redirect ()->toRoute ( 'auth', array (
				'controller' => 'auth',
				'action' => 'index'
				) );
			}
		}

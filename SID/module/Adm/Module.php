<?php

namespace Adm;

use Zend\ModuleManager\ModuleManager;
use Zend\Session\Container;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Adm\Service\Divulgacao as DivulgacaoService;
use Adm\Service\User as UserService;

class Module {
	public function init(ModuleManager $moduleManager) {
		$sharedEvents = $moduleManager->getEventManager ()->getSharedManager ();

		$sharedEvents->attach ( 'Zend\Mvc\Controller\AbstractActionController', MvcEvent::EVENT_DISPATCH, array (
				$this,
				'Autenticacao'
		), 99 );
	}

	// Verifica se a rota precisa ou não de Autenticacao.
	public function Autenticacao($e) {
		// Pega o endereço e simplifica para a rota expecifica.
		$controller = $e->getTarget ();
		$rota = $controller->getEvent ()->getRouteMatch ()->getMatchedRouteName ();

		$sessao = new Container ( 'Auth' );

		// Pega a string $rota e quebra nos locais onde tem /
		$rotaExterna = explode("/",$rota);

		// verifica se a rota é: "home" que é o / ou alguma outra das rotas do mudulo adm.
		if ($rotaExterna[0]=="home" || $rotaExterna[0]=="divulgacao" || $rotaExterna[0]=="administrador" || $rotaExterna[0]=="imagem") {
			if (! $sessao->admin) {
				return $controller->redirect ()->toRoute ( 'auth' );
			}
		}
	}

	public function onBootstrap(MvcEvent $e) {
		$eventManager = $e->getApplication ()->getEventManager ();
		$moduleRouteListener = new ModuleRouteListener ();
		$moduleRouteListener->attach ( $eventManager );

		// Início
		$e->getApplication ()->getEventManager ()->getSharedManager ()->attach ( 'Zend\Mvc\Controller\AbstractActionController', 'dispatch', function ($e) {
			$controller = $e->getTarget ();
			$controllerClass = get_class ( $controller );
			$moduleNamespace = substr ( $controllerClass, 0, strpos ( $controllerClass, '\\' ) );
			$config = $e->getApplication ()->getServiceManager ()->get ( 'config' );
			if (isset ( $config ['module_layouts'] [$moduleNamespace] )) {
				$controller->layout ( $config ['module_layouts'] [$moduleNamespace] );
			}
		}, 100 );
		// fim (Essa parte define a chamada dos layouts para os diferentes módulos )
	}
	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}
	public function getAutoloaderConfig() {
		return array (
				'Zend\Loader\StandardAutoloader' => array (
						'namespaces' => array (
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
						)
				)
		);
	}
	public function getServiceConfig() {
		return array (
				'factories' => array (
						'Adm\Service\Divulgacao' => function ($service) {
							return new DivulgacaoService ( $service->get ( 'Doctrine\ORM\EntityManager' ) );
						},
						'Adm\Service\User' => function ($service) {
							return new UserService ( $service->get ( 'Doctrine\ORM\EntityManager' ) );
						}
				)
		);
	}
}

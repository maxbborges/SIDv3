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
	public function Autenticacao($e) {
		$controller = $e->getTarget ();
		$rota = $controller->getEvent ()->getRouteMatch ()->getMatchedRouteName ();
		
		// echo "Rota = ".$rota."<br>";
		
		$sessao = new Container ( 'Auth' );
		
		// echo "admin = ".$sessao->admin."<br>";
		
		if ($rota != "cliente" && $rota != "auth" && $rota != "auth/default" && $rota != "auth/index" && $rota != "auth/callback" && $rota != "auth/sair") {
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

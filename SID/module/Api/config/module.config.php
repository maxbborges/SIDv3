<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Api;

return array(
	'controllers' => array(
		'invokables' => array(
			'Api\Controller\Reqbd' => 'Api\Controller\ReqbdController',
			'Api\Controller\Reqmobile' => 'Api\Controller\ReqmobileController',
			'Api\Controller\Restfulbd' => 'Api\Controller\RestfulbdController',
			'Api\Controller\Restfulmobile' => 'Api\Controller\RestfulmobileController',

		),
	),
	'router' => array(
		'routes' => array(
			'bd' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route'    => '/bd',
					'defaults' => array(
						'__NAMESPACE__' => 'Api\Controller',
						'controller' => 'Restfulbd',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'reqbd' => array(
						'type'    => 'segment',
						'options' => array(
							'route'    => '/[/:action]',
							'constraints' => array(
								'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
								'controller' => 'Reqbd',
								'action'     => 'index'
							),
						),
					),
				),
			),
			'mobile' => array(
					'type' => 'Zend\Mvc\Router\Http\Literal',
					'options' => array(
							'route'    => '/mobile',
							'defaults' => array(
									'__NAMESPACE__' => 'Api\Controller',
									'controller' => 'Restfulmobile',
							),
					),
					'may_terminate' => true,
					'child_routes' => array(
						'reqbd' => array(
							'type'    => 'segment',
							'options' => array(
								'route'    => '/[/:action]',
								'constraints' => array(
									'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
								),
								'defaults' => array(
									'controller' => 'Reqmobile',
									'action'     => 'index'
								),
							),
						),
					),
			),
		),
	),
	'service_manager' => array(
		'abstract_factories' => array(
			'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
			'Zend\Log\LoggerAbstractServiceFactory',
		),
		'factories' => array(
			'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
		),
	),
	'translator' => array(
		'locale' => 'en_US',
		'translation_file_patterns' => array(
			array(
				'type'     => 'gettext',
				'base_dir' => __DIR__ . '/../language',
				'pattern'  => '%s.mo',
			),
		),
	),
	'view_manager' => array(
		'display_not_found_reason' => true,
		'display_exceptions'       => true,
		'doctype'                  => 'HTML5',
		'not_found_template'       => 'error/404',
		'exception_template'       => 'error/index',
		'template_map' => array(
            // 'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            // 'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            // 'error/404'               => __DIR__ . '/../view/error/404.phtml',
            // 'error/index'             => __DIR__ . '/../view/error/index.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
    // Placeholder for console routes
	'console' => array(
		'router' => array(
			'routes' => array(
			),
		),
	),
);

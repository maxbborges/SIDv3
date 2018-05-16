<?php

namespace Adm;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Adm\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        	'auth' => array(
    			'type' => 'Zend\Mvc\Router\Http\Literal',
        		'options' => array(
            		'route'    => '/auth',
            		'defaults' => array(
            			'controller' => 'Adm\Controller\Auth',
            			'action'     => 'index',
         			),
     			),
     			'may_terminate' => true,
     			'child_routes' => array(
         			'default' => array(
             			'type'    => 'Segment',
             			'options' => array(
                  			'route'    => '[/:action]',
                  			'constraints' => array(
                       			'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                       			'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                   			),
                   			'defaults' => array(),
             			),
        	 		),
     			),
 			),
        	'divulgacao' => array(
        		'type' => 'Segment',
        		'options' => array(
        			'route' => '/adm/[:controller[/:action]]',
        			'defaults' => array(
        				'action' => 'index',
        			),
        		),
        	),
        	'administrador' => array(
        		'type' => 'Segment',
        		'options' => array(
        			'route' => '/adm/[:controller[/:action]]',
        			'defaults' => array(
        				'action' => 'index',
        			),
        		),
        	),
        	'imagem' => array(
       			'type' => 'Segment',
        		'options' => array(
       				'route' => '/adm/[:controller[/:action]]',
       				'defaults' => array(
      						'action' => 'index',
        			),
        		),
        	),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
        	'Adm\Controller\Index' =>	'Adm\Controller\IndexController',
        	'Adm\Controller\Auth' =>	'Adm\Controller\AuthController',
       		'divulgacao' => 'Adm\Controller\DivulgacaoController',
        	'imagem' => 'Adm\Controller\ImagemController',
        	'administrador' => 'Adm\Controller\AdministradorController',
        ),
    ),
	// essa parte é usada para definir diferentes layouts dos módulos, os nomes devem estar iguais em todos os locais 
	'module_layouts' => array(
		'Adm' => 'layout/layout-Adm',
	),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout-Adm.phtml',
            'adm/index/index' => __DIR__ . '/../view/adm/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
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
	'doctrine' => array(
		'driver' => array(
			__NAMESPACE__ . '_driver' => array(
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
			),
			'orm_default' => array(
				'drivers' => array(
					__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
				)
			)
		)
	)
		
);

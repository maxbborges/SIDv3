<?php

namespace Cliente;

return array(
    'router' => array(
        'routes' => array(
            'cliente' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/cli',
                    'defaults' => array(
                        'controller' => 'Cliente\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
    	),
    ),
    'controllers' => array(
        'invokables' => array(
            'Cliente\Controller\Index' => Controller\IndexController::class
        ),
    ),
	// essa parte é usada para definir diferentes layouts dos módulos, os nomes devem estar iguais em todos os locais
	'module_layouts' => array(
		'Cliente' => 'layout/layout-Cliente',
	),	
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout-Cliente.phtml',
            'cliente/index/index' => __DIR__ . '/../view/cliente/index/index.phtml',
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
);

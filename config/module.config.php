<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\DeveloperTools;

return [

    'service_manager' => [
        'factories' => [
            // Collectors
            RoleCollector::class =>
                Factory\RoleCollectorFactory::class
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'zend-developer-tools/toolbar/msbios-guard-authorize-role' =>
                __DIR__ . '/../view/zend-developer-tools/toolbar/msbios-guard-authorize-role.phtml',
        ],
    ],

    'zenddevelopertools' => [
        'profiler' => [
            'collectors' => [
                RoleCollector::class =>
                    RoleCollector::class,
            ],
        ],
        'toolbar' => [
            'entries' => [
                RoleCollector::class =>
                    'zend-developer-tools/toolbar/msbios-guard-authorize-role',
            ],
        ],
    ],
];

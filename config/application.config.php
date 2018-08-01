<?php
/**
 * If you need an environment-specific system or application configuration,
 * there is an example in the documentation
 * @see https://docs.zendframework.com/tutorials/advanced-config/#environment-specific-system-configuration
 * @see https://docs.zendframework.com/tutorials/advanced-config/#environment-specific-application-configuration
 */
return [
    // Retrieve list of modules used in this application.
    'modules' => [
        'MSBios\Guard\Resource',
        'MSBios\Cache',
        'Zend\Cache',
        'Zend\Serializer',
        'Zend\Hydrator',
        'Zend\InputFilter',
        'Zend\Filter',
        'MSBios\View',
        'Zend\Db',
        'Zend\Mvc\Plugin\Prg',
        'Zend\Mvc\Plugin\Identity',
        'Zend\Mvc\Plugin\FilePrg',
        'Zend\Mvc\Plugin\FlashMessenger',
        'Zend\Navigation',
        'Zend\Router',
        'Zend\Form',
        'Zend\I18n',
        'MSBios\Test',
        'MSBios\I18n',
        'MSBios\Db',
        'MSBios\Assetic',
        'MSBios\Form',
        'MSBios\Widget',
        'MSBios\Theme',
        'MSBios\Navigation',
        'MSBios\Application',
        'MSBios\Authentication',
        'MSBios\Guard',
        'MSBios\Resource',
        'MSBios\Guard\DeveloperTools',
        'Zend\Log',
        'ZendDeveloperTools',
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],
        'config_cache_enabled' => false,
        // 'config_cache_key' => 'application.config.cache',
        'module_map_cache_enabled' => false,
        // 'module_map_cache_key' => 'application.module.cache',
        'cache_dir' => 'data/cache/',
    ],
];

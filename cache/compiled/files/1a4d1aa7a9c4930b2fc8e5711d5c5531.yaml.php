<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/mglaman/Drupal/commerce/commerce-docs/user/config/system.yaml',
    'modified' => 1504805382,
    'data' => [
        'home' => [
            'alias' => '/commerce2'
        ],
        'pages' => [
            'theme' => 'commerce',
            'markdown_extra' => true,
            'process' => [
                'markdown' => true,
                'twig' => false
            ]
        ],
        'cache' => [
            'enabled' => true,
            'check' => [
                'method' => 'file'
            ],
            'driver' => 'auto',
            'prefix' => 'g'
        ],
        'twig' => [
            'cache' => true,
            'debug' => false,
            'auto_reload' => true,
            'autoescape' => false
        ],
        'assets' => [
            'css_pipeline' => true,
            'css_minify' => true,
            'css_rewrite' => true,
            'js_pipeline' => true,
            'js_minify' => true
        ],
        'debugger' => [
            'enabled' => false,
            'twig' => true,
            'shutdown' => [
                'close_connection' => true
            ]
        ]
    ]
];

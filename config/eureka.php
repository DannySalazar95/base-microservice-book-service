<?php

return [
    'config' => [
        'eurekaDefaultUrl' => 'http://localhost:8761',
        'hostName'         => 'localhost',
        'appName'          => 'service-book',
        'ip'               => '127.0.0.1',
        'port'             => ['8091', true],
        'homePageUrl'      => 'http://localhost:8091',
        'statusPageUrl'    => 'http://localhost:8091/info',
        'healthCheckUrl'   => 'http://localhost:8091/health'
    ]
];
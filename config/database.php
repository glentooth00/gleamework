<?php

return [
    'default' => 'mysqli', // Change to 'sqlsrv' or 'mysql' for SQL Server

    'connections' => [
        'mysqli' => [
            'driver' => 'mysqli',
            'host' => '127.0.0.1',
            'database' => 'systems',
            'username' => 'root',
            'password' => 'root',
        ],
        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'server' => '192.168.222.186',
            'database' => 'ILECO3',
            'username' => '',
            'password' => '',
        ]
    ]
];

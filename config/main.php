<?php

return [
    // Default route
    'DEFAULT_CONTROLLER' => env('DEFAULT_ROUTE', 'Home'),
    'DEFAULT_METHOD' => env('DEFAULT_METHOD', 'Index'),

    // Database
    'DBNAME' => env('DBNAME', ''),
    'DBUSER' => env('DBUSER', ''),
    'DBPASS' => env('DBPASS', ''),

    // PATH
    'VIEW_PATH' => env('VIEW_PATH', './views'),
];
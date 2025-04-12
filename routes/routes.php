<?php

return [
    'post' => [
        '/login' => 'Login@store'
    ],
    'get' => [
        '/' => 'Home@index',
//        '/user/create' => 'User@create',
//        '/user/[a-z0-9]+' => 'User@show',
        '/login' => 'Login@index',
    ]
];

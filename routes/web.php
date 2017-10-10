<?php

$routes = [];

$routes = [
    'homepage'=>[
        'controller'=>'indexController',
        'action'=>'index'
    ],
    'list' => [
        'controller' => 'notesController',
        'action' => 'listing'
    ]
];
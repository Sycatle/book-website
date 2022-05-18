<?php

namespace sycatle\beblio;

class Router {
    private $routes = [
        'main' => [
            'pageTitle' => 'Accueil',
            'controller' => './src/controllers/MainController.php'
        ],
        'explore' => [
            'pageTitle' => 'Explorer',
            'controller' => './src/controllers/ExploreController.php'
        ]
    ];

    public function isRoute($route){
        return \in_array($route, $routes);
    }

    function __construct($route){
        if (isRoute($route)) die("Error 404");
        
        echo("Router initialized with " . $route . " controller.");
    }
    
}
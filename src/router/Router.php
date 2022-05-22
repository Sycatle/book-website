<?php

namespace App\Router;

use Exception;

class Router {
    private $url;
    private $routes = [];
    private $namedRoutes = [];

    public function __construct($url){
        $this->url = $url;
    }
    
    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, $name, "GET");
    }

    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, $name, "POST");
    }

    private function add($path, $callable, $name, $method) {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if ($name) {
            $this->namedRoutes[$name] = $route;
        }
        return $this->route;
    }

    public function run(){
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterException('REQUEST_METHOD doesn\'t exists');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        throw new RouterException('No matching routes');
    }

    public function url($name, $params = []){
        if (!isset($this->namedRoutes[$name])) {
            throw new RouterException('No route match this name');
        }
        $this->namedRoutes[$name]->getUrl($params);
    }

}
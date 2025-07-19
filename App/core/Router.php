<?php

namespace App\Core;

class Router
{
    public static function resolve(array $route): void {
 
    $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
    $Uris = trim($requestUri, '/');
  
    if (isset($route[$Uris])) {
        
        $route = $route[$Uris];
        $controllerClass = $route['controller'];

        $method = $route['method'];
        $controller = new $controllerClass();
        $controller->$method();
    } else {
       echo "404 Not Found";
    }
   }

}

<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/CocktailController.php';
require_once 'src/controllers/AlcoholController.php';
require_once 'src/controllers/UploadController.php';
require_once 'src/controllers/FetchController.php';

class Routing {
    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function run($url) {
        
        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        if(!array_key_exists($action, self::$routes))
        {
            $object = new DefaultController();
            $object->notFound();
            return;
        }

        $controller = self::$routes[$action];
        $object = new $controller;

        $action = $action ?: 'login';
       
        $object->$action();
    }
}
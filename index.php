<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('main', 'DefaultController');
Routing::get('cocktails', 'CocktailController');
Routing::get('alcohols', 'AlcoholController');
Routing::get('cocktail', 'CocktailController');
Routing::get('upload', 'UploadController');

Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('upload', 'UploadController');

Routing::run($path);
 
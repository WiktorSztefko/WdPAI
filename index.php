<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('main', 'DefaultController');
Routing::get('account', 'DefaultController');

Routing::get('cocktails', 'CocktailController');
Routing::get('cocktail', 'CocktailController');

Routing::get('alcohols', 'AlcoholController');
Routing::get('upload', 'UploadController');
Routing::get('logout', 'SecurityController');

Routing::get('tasks', 'FetchController');
Routing::get('ingredients', 'FetchController');
Routing::get('units', 'FetchController');
Routing::get('like', 'FetchController');
Routing::get('userLikesCocktail', 'FetchController');

Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('upload', 'UploadController');
Routing::post('search', 'CocktailController');

Routing::run($path);
 
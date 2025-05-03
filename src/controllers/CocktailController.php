<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Cocktail.php';
require_once __DIR__.'/../repository/CocktailRepository.php';

class CocktailController extends AppController {
    
    private $cocktailRepository;

    public function __construct() {
        parent::__construct();
        $this->cocktailRepository = new CocktailRepository();
    }
    
    public function cocktails() {
        $cocktails = $this->cocktailRepository->getCocktails();
        $this->render('cocktails', ['cocktails' => $cocktails]);
    }

    public function cocktail() {
        if(!$this->isGet())
            $this->cocktails();

        $name = $_GET['name'];
        $item = $this->cocktailRepository->getCocktail($name);
   
        if($item === null)
            $this->cocktails();
        
        $this->render('cocktail', ['item' => $item]);
    }
}
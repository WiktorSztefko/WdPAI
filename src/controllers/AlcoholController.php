<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Alcohol.php';
require_once __DIR__.'/../repository/AlcoholRepository.php';

class AlcoholController extends AppController {
    
    private $alcoholRepository;

    public function __construct() {
        parent::__construct();
        $this->alcoholRepository = new AlcoholRepository();
    }
    
    public function alcohols() {
        $alcohols = $this->alcoholRepository->getAlcohols();
        $this->render('alcohols', ['alcohols' => $alcohols]);
    }
}
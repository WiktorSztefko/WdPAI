<?php
require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function login() {
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function main() {
        $this->render('main');
    }

    public function cocktails() {
        $this->render('cocktails');
    }

    public function alcohols() {
        $this->render('alcohols');
    }

     public function item() {
        $this->render('item');
    }
}
<?php
require_once 'AppController.php';

class DefaultController extends AppController
{
    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function account()
    {
        $this->render('account');
    }
    public function main()
    {
        $this->render('main');
    }

    public function notFound()
    {
        http_response_code(404);
        $this->render('notFound');
    }
}
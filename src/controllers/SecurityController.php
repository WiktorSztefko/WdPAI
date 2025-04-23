<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class securityController extends AppController {
    
    public function login() {
        $user = new User("js@wp.pl", "admin", "marek", "kowal");

        if ($this->isPost())
        {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $messages = [];

            $messages["error_login"] = "Nieprawidłowy login lub hasło";
            $messages["value_email"] = $email;
    
            if ($user->getEmail() != $email || $user->getPassword() != $password)
                return $this->render('login', ["messages" => $messages]);

            return $this->render('main');
        }
        else
        {
            return $this->render('login');
        }
    }

    public function register() {
        if ($this->isPost())
        {
            $fields = ["name", "surname", "email", "username", "password", "confirmedPassword"];
            $messages = [];
            $all_correct = true;

            foreach ($fields as $field) {
                $$field = $_POST[$field] ?? "";
    
                if (trim($$field) === "") {
                    $messages["error_$field"] = "To pole  jest wymagane";
                    $all_correct = false;
                }

                if (!in_array($field, ['password', 'confirmedPassword']))
                    $messages["value_$field"] = $$field;
            }

            if ($all_correct) {
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: $url/main");
            }
            else
                return $this->render('register', ["messages" => $messages]);
        }
        else
            return $this->render('register');
    }
}
<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }
    
    public function login() {
        if (!$this->isPost())
            return $this->render('login');

        $email = $_POST["email"];
        $password = $_POST["password"];
        $messages = [];
        $user = $this->userRepository->getUser($email);

        if(!$user || $user->getEmail() != $email || !password_verify($password, $user->getPassword())) {
            $messages["value_email"] = $email;
            $messages["error_login"] = "Nieprawidłowy login lub hasło";
            return $this->render('login', ["messages" => $messages]);
        }

        return $this->render('main');
    }

    public function register() {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($name, $surname, $username, $email, $hashedPassword);
        $this->userRepository->addUser($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/main");
    }
}
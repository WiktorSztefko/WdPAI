<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost())
            return $this->render('login');

        $email = $_POST["email"];
        $password = $_POST["password"];
        $messages = [];
        $user = $this->userRepository->getUser($email);

        if (!$user || $user->getEmail() != $email || !password_verify($password, $user->getPassword())) {
            $messages["value_email"] = $email;
            $messages["error_login"] = "Nieprawidłowy login lub hasło";
            return $this->render('login', ["messages" => $messages]);
        }

        session_start();
        $_SESSION['user'] = $user;
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/main");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $username = trim($_POST['username']);
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $messages = [];

        $emailExists = $this->userRepository->checkEmail($email);
        $usernameExists = $this->userRepository->checkUsername($username);

        if ($emailExists && !isset($messages['email']))
            $messages['warningEmail'] = "Podany email już istnieje w systemie";

        if ($usernameExists)
            $messages['warningUsername'] = "Podana nazwa użytkownika już istnieje w systemie";

        if (isset(($messages['warningEmail'])) || isset(($messages['warningUsername']))) {
            $fields = ["name", "surname", "email", "username"];
            foreach ($fields as $field) {
                $$field = $_POST[$field] ?? "";
                $messages["value_$field"] = $$field;
            }
            return $this->render('register', ["messages" => $messages]);
        }

        $user = new User($name, $surname, $username, $email, $hashedPassword);
        $this->userRepository->addUser($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/main");
    }

    public function logout()
    {
        session_start();
        if (isset($_SESSION['user']))
            session_destroy();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/login");
    }
}
<?php

class User {
    private $name;
    private $surname;
    private $username;
    private $email;
    private $password;

    public function __construct(string $name, string $surname, string $username, string $email, string $password) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getSurname() : string {
        return $this->surname;
    }

    public function setSurname(string $surname){
        $this->surname = $surname;
    }

    public function getUsername() : string {
        return $this->username;
    }

    public function setUsername(string $username){
        $this->username = $username;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }
}
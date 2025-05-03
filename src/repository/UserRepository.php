<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_user_details = ud.id_user_details WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false)
            return null;

        return new User(
            $user['name'],
            $user['surname'],
            $user['username'],
            $user['email'],
            $user['password'],
        );
    }

    public function addUser(User $user) {
       $connection = $this->database->connect();

        try {
            $connection->beginTransaction();

            $stmt = $connection->prepare('
                INSERT INTO users_details (name, surname)
                VALUES (?, ?) RETURNING id_user_details
            ');

            $stmt->execute([
                $user->getName(),
                $user->getSurname(),
            ]);

            $id = $stmt->fetchColumn();

            $stmt = $connection->prepare('
                INSERT INTO users (username, email, password, id_user_details)
                VALUES (?, ?, ?, ?)
            ');

            $stmt->execute([
                $user->getUsername(),
                $user->getEmail(),
                $user->getPassword(),
                $id
            ]);

            $connection->commit();

        } catch (Exception $e) {
            $connection->rollBack();
            throw $e;
        }
    }
}
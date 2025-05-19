<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT * FROM users u 
            LEFT JOIN users_details ud ON u.id_user_details = ud.id_user_details 
            LEFT JOIN users_roles ur ON ur.id_user = u.id_user
            LEFT JOIN roles r ON r.id_role = ur.id_role
            WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false)
            return null;

        $stmt = $connection->prepare('
                SELECT name_role FROM public.users_roles ur
                join roles r on r.id_role = ur.id_role
                where ur.id_user = :id

        ');
        $stmt->bindParam(':id', $user['id_user'], PDO::PARAM_STR);
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return new User(
            $user['name'],
            $user['surname'],
            $user['username'],
            $user['email'],
            $user['password'],
            $roles,
            $user['id_user']
        );
    }

    public function addUser(User $user)
    {
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

            $stmt = $connection->prepare('
                INSERT INTO users_roles (id_user, id_role)
                VALUES (?, ?)
            ');

            $defaultRole = 2;
            $stmt->execute([
                $id,
                $defaultRole,
            ]);

            $connection->commit();

        } catch (Exception $e) {
            $connection->rollBack();
            //throw $e;
        }
    }

    public function checkEmail(string $request): bool
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT email FROM users WHERE email = :request
        ');
        $stmt->bindParam(':request', $request, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function checkUsername(string $request): bool
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT username FROM users WHERE username = :request
        ');
        $stmt->bindParam(':request', $request, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
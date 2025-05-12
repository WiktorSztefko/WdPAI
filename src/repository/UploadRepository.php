<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Cocktail.php';

class UploadRepository extends Repository
{
    public function addCocktail(Cocktail $cocktail): void
    {
        $connection = $this->database->connect();
        $date = new DateTime();

        try {
            $connection->beginTransaction();

            $stmt = $connection->prepare('
                INSERT INTO cocktails
                (name, description, fun_fact, image, created_at, id_assigned_by, difficulty_level, preparation_instruction)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?) RETURNING id_cocktail
            ');

            session_start();
            $assignedById = $_SESSION['user']->getId();

            $stmt->execute([
                $cocktail->getName(),
                $cocktail->getDescription(),
                $cocktail->getFunFact(),
                $cocktail->getImage(),
                $date->format('Y-m-d'),
                $assignedById,
                $cocktail->getDifficultyLevel(),
                $cocktail->getPreparationInstruction(),
            ]);

            $id = $stmt->fetchColumn();

            $stmt = $connection->prepare('
                INSERT INTO cocktails_ingredients (id_cocktail, id_ingredient, quantity, id_unit)
                VALUES (?, ?, ?, ?)
            ');

            foreach ($cocktail->getIngredients() as $item) {
                $stmt->execute([
                    $id,
                    $item['id_ingredient'],
                    $item['quantity'],
                    $item['id_unit'],
                ]);
            }

            $connection->commit();
        } catch (Exception $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function checkName(string $request): bool
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT name FROM cocktails WHERE name = :request
        ');
        $stmt->bindParam(':request', $request, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function checkImage(string $request): bool
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT image FROM cocktails WHERE image = :request
        ');
        $stmt->bindParam(':request', $request, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
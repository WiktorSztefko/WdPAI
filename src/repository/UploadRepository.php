<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Cocktail.php';

class UploadRepository extends Repository {

    public function addCocktail(Cocktail $cocktail): void {
        $connection = $this->database->connect();
        $date = new DateTime();

        try {
            $connection->beginTransaction();

            $stmt = $connection->prepare('
                INSERT INTO cocktails (name, description, fun_fact, image, created_at, id_assigned_by, difficulty_level, preparation_instruction)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?) RETURNING id_cocktail
            ');

            //TODO you should get this value from logged user session
            $assignedById = 1;

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

    public function getIngredients(): array {
        $stmt = $this->database->connect()->prepare('
            SELECT id_ingredient, name_ingredient FROM ingredients ORDER BY name_ingredient ASC 
        ');

        $stmt->execute();
        $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ingredients;
    }

    public function getUnits(): array {
        $stmt = $this->database->connect()->prepare('
            SELECT id_unit, name_unit FROM units ORDER BY id_unit ASC 
        ');

        $stmt->execute();
        $units = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $units;
    }
}
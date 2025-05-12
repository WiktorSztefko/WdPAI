<?php

require_once 'Repository.php';

class FetchRepository extends Repository
{
    public function getTasks(): array
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT description_task FROM tasks
        ');

        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }

    public function getIngredients(): array
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT id_ingredient, name_ingredient FROM ingredients ORDER BY name_ingredient ASC 
        ');

        $stmt->execute();
        $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ingredients;
    }

    public function getUnits(): array
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT id_unit, name_unit FROM units ORDER BY id_unit ASC 
        ');

        $stmt->execute();
        $units = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $units;
    }

    public function like(int $id_user, int $id_cocktail)
    {
        $connection = $this->database->connect();
        try {
            $connection->beginTransaction();

            $alreadyLiked = $this->userLikesCocktail($id_user, $id_cocktail);

            if ($alreadyLiked['liked']) {
                $stmt = $this->database->connect()->prepare('
                    DELETE FROM LIKES  WHERE id_user = :id_u AND id_cocktail = :id_c
                ');
                $stmt->bindParam(':id_u', $id_user, PDO::PARAM_INT);
                $stmt->bindParam(':id_c', $id_cocktail, PDO::PARAM_INT);
                $stmt->execute();
                $connection->commit();

                return ['liked' => false, 'message' => 'Like deleted'];
            } else {
                $stmt = $this->database->connect()->prepare('
                    INSERT INTO likes(id_user, id_cocktail) VALUES(?, ?)
                ');
                $stmt->execute([$id_user, $id_cocktail]);
                $connection->commit();

                return ['liked' => true, 'message' => 'Liked successfully'];
            }
        } catch (Exception $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    public function userLikesCocktail(int $id_user, int $id_cocktail): array
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT * FROM public.likes WHERE id_user = :id_u AND id_cocktail = :id_c
        ');

        $stmt->bindParam(':id_u', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_c', $id_cocktail, PDO::PARAM_INT);

        $stmt->execute();
        return ['liked' => $stmt->rowCount() > 0];
    }
}
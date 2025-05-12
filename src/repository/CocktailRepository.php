<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Cocktail.php';

class CocktailRepository extends Repository
{
    public function getCocktail(string $name): ?Cocktail
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            select  c.id_cocktail, name, image, difficulty_level, description, fun_fact, preparation_instruction, count(l.id_cocktail) as likes from cocktails c
			left join likes l on l.id_cocktail = c.id_cocktail
			where c.name= :name
			group by c.id_cocktail
        ');

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $connection->prepare('
            select i.name_ingredient, ci.quantity, u.name_unit from cocktails c
            join cocktails_ingredients ci on ci.id_cocktail = c.id_cocktail
            join ingredients i on i.id_ingredient = ci.id_ingredient
            join units u on u.id_unit = ci.id_unit
            where c.name= :name
        ');

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $cocktailIngredients = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$result)
            return null;

        $cocktail = new Cocktail($result['name'], $result['image']);
        $cocktail->setDescription($result['description']);
        $cocktail->setFunFact($result['fun_fact']);
        $cocktail->setDifficultyLevel($result['difficulty_level']);
        $cocktail->setPreparationInstruction($result['preparation_instruction']);
        $cocktail->setIngredients($cocktailIngredients);
        $cocktail->setLikes($result['likes']);
        $cocktail->setId($result['id_cocktail']);

        return $cocktail;
    }

    public function getCocktails(): array
    {
        $result = [];
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT * FROM cocktails ORDER BY id_cocktail ASC 
        ');

        $stmt->execute();
        $cocktails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cocktails as $cocktail) {
            $result[] = new Cocktail(
                $cocktail['name'],
                $cocktail['image']
            );
        }
        return $result;
    }

    public function getCocktailByKey(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';
        $connection = $this->database->connect();

        $stmt = $connection->prepare("
            SELECT
                c.*
            FROM
                cocktails c
            JOIN
                cocktails_ingredients ci ON c.id_cocktail = ci.id_cocktail
            JOIN
                ingredients i ON ci.id_ingredient = i.id_ingredient
            WHERE 
                LOWER(c.name) LIKE :search OR 
                LOWER(c.preparation_instruction) LIKE :search OR
                LOWER(i.name_ingredient) LIKE :search
            GROUP BY
                c.id_cocktail
            ORDER BY c.id_cocktail
        ");
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
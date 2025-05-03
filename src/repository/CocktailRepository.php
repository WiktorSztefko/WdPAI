<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Cocktail.php';

class CocktailRepository extends Repository {

    public function getCocktail(string $name): ?Cocktail {
        $stmt = $this->database->connect()->prepare('
            select name, image, difficulty_level, description, fun_fact, preparation_instruction from cocktails  where name = :name
        ');

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
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

        return $cocktail;
    }

      public function getCocktails(): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
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
}
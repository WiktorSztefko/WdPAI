<?php

class Cocktail {
    private $name;
    private $image;
    private $difficultyLevel;
    private $description;
    private $funFact;
    private $ingredients;
    private $preparationInstruction;

    public function __construct($name, $image) {
        $this->name = $name;
        $this->image = $image;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image) {
        $this->image = $image;
    }

    public function getDifficultyLevel(): int {
        return $this->difficultyLevel;
    }

    public function setDifficultyLevel(int $difficultyLevel) {
        $this->difficultyLevel = $difficultyLevel;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function getFunFact(): string {
        return $this->funFact;
    }

    public function setFunFact(string $funFact) {
        $this->funFact = $funFact;
    }

    public function getIngredients(): array {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients){
        $this->ingredients = $ingredients;
    }

    public function getPreparationInstruction(): string {
        return $this->preparationInstruction;
    }

    public function setPreparationInstruction(string $preparationInstruction) {
        $this->preparationInstruction = $preparationInstruction;
    }
}
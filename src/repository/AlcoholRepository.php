<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Alcohol.php';

class AlcoholRepository extends Repository
{
    public function getAlcohols(): array
    {
        $result = [];
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT name, image FROM alcohols ORDER BY id_alcohol ASC 
        ');

        $stmt->execute();
        $alcohols = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($alcohols as $alcohol) {
            $result[] = new Alcohol(
                $alcohol['name'],
                $alcohol['image']
            );
        }
        return $result;
    }
}
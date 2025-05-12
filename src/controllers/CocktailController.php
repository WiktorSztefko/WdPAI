<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Cocktail.php';
require_once __DIR__ . '/../repository/CocktailRepository.php';

class CocktailController extends AppController
{
    private $cocktailRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cocktailRepository = new CocktailRepository();
    }

    public function cocktails()
    {
        $cocktails = $this->cocktailRepository->getCocktails();
        $this->render('cocktails', ['cocktails' => $cocktails]);
    }

    public function cocktail()
    {
        if (!$this->isGet())
            $this->cocktails();

        $name = $_GET['name'];
        $item = $this->cocktailRepository->getCocktail($name);

        if ($item === null) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/cocktails");
        }

        $this->render('cocktail', ['item' => $item]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->cocktailRepository->getCocktailByKey($decoded['search']));
        }
    }
}
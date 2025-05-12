<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/FetchRepository.php';

class FetchController extends AppController
{
    private $fetchRepository;

    public function __construct()
    {
        parent::__construct();
        $this->fetchRepository = new FetchRepository();
    }

    public function tasks()
    {
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->fetchRepository->getTasks());
    }

    public function ingredients()
    {
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->fetchRepository->getIngredients());
    }

    public function units()
    {
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->fetchRepository->getUnits());
    }
    public function like()
    {
        session_start();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->fetchRepository->like($_SESSION['user']->getId(), $decoded['id']));
        }
    }

    public function userLikesCocktail()
    {
        session_start();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->fetchRepository->userLikesCocktail($_SESSION['user']->getId(), $decoded['id']));
        }
    }
}
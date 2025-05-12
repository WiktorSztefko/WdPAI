<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Cocktail.php';
require_once __DIR__ . '/../repository/UploadRepository.php';

class UploadController extends AppController
{

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/images/cocktails/';
    private $messages = [];
    private $uploadRepository;

    public function __construct()
    {
        parent::__construct();
        $this->uploadRepository = new uploadRepository();
    }

    public function upload()
    {
        if (
            $this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) &&
            $this->validate($_FILES['file']) && $this->checkUnique($_POST['name'], $_FILES['file']['name'])
        ) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );

            $cocktail = new Cocktail($_POST['name'], $_FILES['file']['name']);
            $cocktail->setDescription($_POST['description']);
            $cocktail->setFunFact($_POST['funFact']);
            $cocktail->setDifficultyLevel($_POST['difficultyLevel']);
            $cocktail->setPreparationInstruction($_POST['preparationInstruction']);

            $informations = array_map(null, $_POST['ingredientsNames'], $_POST['ingredientsCounts'], $_POST['ingredientsUnits']);

            foreach ($informations as &$item) {
                $item = [
                    'id_ingredient' => $item[0],
                    'quantity' => $item[1],
                    'id_unit' => $item[2]
                ];
            }
            unset($item);
            $cocktail->setIngredients($informations);
            $this->uploadRepository->addCocktail(($cocktail));

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/cocktails");
        } else if ($this->isPost()) {
            $this->messages['name'] = $_POST['name'];
            $this->messages['description'] = $_POST['description'];
            $this->messages['preparationInstruction'] = $_POST['preparationInstruction'];
            $this->messages['funFact'] = $_POST['funFact'];
            $this->messages['difficultyLevel'] = $_POST['difficultyLevel'];
            $this->render('upload', ["messages" => $this->messages]);
        }

        if ($this->isGet())
            $this->render('upload');
    }

    public function validate(array $file): bool
    {
        $isValid = true;

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages['type'] = 'File type is not supported';
            $isValid = false;
        }

        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages['size'] = 'File is too large for destination file system';
            $isValid = false;
        }

        return $isValid;
    }

    public function checkUnique(string $name, string $image): bool
    {
        $isUnique = true;

        if ($this->uploadRepository->checkName($name)) {
            $this->messages['warningName'] = 'Nazwa koktajlu musi być unikalna';
            $isUnique = false;
        }

        if ($this->uploadRepository->checkImage($image)) {
            $this->messages['warningImage'] = 'Nazwa pliku musi być unikalna';
            $isUnique = false;
        }

        return $isUnique;
    }
}
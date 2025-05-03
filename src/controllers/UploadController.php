<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Cocktail.php';
require_once __DIR__.'/../repository/UploadRepository.php';

class UploadController extends AppController {
    
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/images/coctails/';
    private $messages = [];
    private $uploadRepository;

    public function __construct() {
        parent::__construct();
        $this->uploadRepository = new uploadRepository();
    }

    public function upload() {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
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
        }

        if($this->isGet()) {
            $this->messages['ingredients'] = $this->uploadRepository->getIngredients();
            $this->messages['units'] = $this->uploadRepository->getUnits();
            $this->render('upload', ['messages' => $this->messages]);
        }
    }

    public function validate(array $file): bool {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system';
            return false;
        }

        if(!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported';
            return false;
        }

        return true;
    }
}
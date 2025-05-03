<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail King - Upload</title>
    <link rel="icon" type="image/png" href="public/images/photos/favicon.png">

    <link rel="stylesheet" href="public/styles/index.css">
    <link rel="stylesheet" href="public/styles/upload.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300public800;1,300public800&family=Roboto:ital,wght@0,100public900;1,100public900&family=Rubik:ital,wght@0,300public900;1,300public900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <script src="public/scripts/FileInput.js" defer></script>
    <script>
             const ingredientsData = <?php echo json_encode($messages['ingredients']); ?>;
             const unitsData = <?php echo json_encode($messages['units']); ?>;
    </script>
    <script src="public/scripts/ingredientInput.js" defer></script>
    
</head>

<body>
    <header>
        <a href="main" class="flex-center">
            <img id="logo" src="public/images/photos/logo.jpeg" alt="" class="images-fit">
            <h1 class="header-text">Cocktail King</h1>
        </a>
    </header>

    <main>
        <section>
                <h1 class="header-text">Dodaj Koktajl</h1>
                <form action="upload" method="POST" enctype="multipart/form-data">
                <div id="data-panel">
                    <div id="text-div">
                        <input type="text" name="name" placeholder="Nazwa koktailu" class="hover-effect-not-scale">
                        <textarea name="description" rows="10" placeholder="Opis koktailu" class="hover-effect-not-scale"></textarea>
                        <textarea name="funFact" rows="10" placeholder="Ciekawostka o Koktailu" class="hover-effect-not-scale"></textarea>
                        <textarea name="preparationInstruction" rows="10" placeholder="Przygotowanie" class="hover-effect-not-scale"></textarea>
                        <div id="difficulty-level-div">
                            <label for="difficulty-level-select">Poziom trudności:</label>
                            <select name="difficultyLevel" id="difficulty-level-select" placeholder="Poziom trudności" class="hover-effect-not-scale">
                                <option value="" selected disabled hidden></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
    
                    <div id="ingredients-div">
                            <h2>Składniki:</h2>
                            <div id="ingredients-list"></div>
    
                            <div id="ingredients-add-button" class="hover-effect">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                    </div>
                </div>

                <div id="file-panel">
                    <div id="file-div">
                        <label for="file-upload" class="hover-effect-not-scale">Wybierz plik</label>
                        <p id="file-name">Nie wybrano pliku</p>
                        <input id="file-upload" name= "file" type="file" style="display: none;" />
                    </div>
                    <button type="submit" class="hover-effect">Dodaj koktajl</button>
                </div>
                </form>
        </section>
    </main>

    <footer>
        <span>Wyjątkowe koktajle, niezapomniane chwile – smakuj życie z każdym łykiem</span>
    </footer>
</body>

<template id="ingredient-template">
    <div class="ingredient-container">
        <select name="ingredientsNames[]" class="count-select hover-effect-not-scale">
            <option value="" selected disabled hidden></option>
        </select>
        <input name="ingredientsCounts[]"type="number" min="1" max="3000" class="hover-effect-not-scale">
        <select name="ingredientsUnits[]" class="unit-select hover-effect-not-scale">
          <option value="" selected disabled hidden></option>
        </select>
        <div class="delete-button hover-effect flex-center">
            <div class="delete-icon">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
    </div>
</template>

</html>
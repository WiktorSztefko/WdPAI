<!DOCTYPE html>
<html lang="pl">

<head>
    <?php include('templates/metaHeader.php'); ?>
    <?php include('templates/redirection.php'); ?>
    <?php
    if (!$isAdministrator) {
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/login");
    }
    ?>

    <title>Cocktail King - Upload</title>

    <link rel="stylesheet" href="public/styles/upload.css">

    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <script src="public/scripts/ingredientInput.js" defer></script>
    <script src="public/scripts/fileInput.js" defer></script>
    <script type="module" src="public/scripts/uploadValidation.js" defer></script>

</head>

<body>
    <?php include('templates/header.php'); ?>
    <?php include('templates/currentUser.php'); ?>

    <main>
        <?php include('templates/nav.php'); ?>

        <section>
            <form action="upload" method="POST" enctype="multipart/form-data">
                <div id="data-panel" class="flex-column gap36">

                    <h1 class="header-text">Upload</h1>

                    <input type="text" name="name" placeholder="Nazwa koktailu" class="hover-effect-not-scale pad6"
                        value="<?= isset($messages['name']) ? ($messages['name']) : '' ?>">
                    <?php if (isset($messages['warningName'])): ?>
                        <div class="messages">
                            <p><i class="fa-solid fa-triangle-exclamation"></i><?= $messages['warningName'] ?></p>
                        </div>
                    <?php endif; ?>

                    <textarea name="description" rows="10" placeholder="Opis koktailu"
                        class="hover-effect-not-scale pad6"><?= isset($messages['description']) ? $messages['description'] : '' ?></textarea>

                    <textarea name="preparationInstruction" rows="10" placeholder="Przygotowanie"
                        class="hover-effect-not-scale pad6"><?= isset($messages['preparationInstruction']) ? $messages['preparationInstruction'] : '' ?></textarea>

                    <textarea name="funFact" rows="10" placeholder="Ciekawostka o Koktailu"
                        class="hover-effect-not-scale pad6"><?= isset($messages['funFact']) ? $messages['funFact'] : '' ?></textarea>

                    <div id="ingredients-div" class="flex-column">
                        <h2>Składniki:</h2>
                        <div id="ingredients-list"></div>

                        <button type="button" id="ingredients-add-button" class="hover-effect-not-scale pad6">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>

                    <div id="difficulty-level-div" class="gap36">
                        <label for="difficulty-level-select">Poziom trudności</label>
                        <select name="difficultyLevel" id="difficulty-level-select" class="hover-effect-not-scale pad6">
                            <option value="" selected disabled hidden></option>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <option value="<?= $i ?>" <?= (isset($messages['difficultyLevel']) && $messages['difficultyLevel'] == $i) ? 'selected' : '' ?>>
                                    <?= $i ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div id="file-panel" class="flex-column gap36">
                        <div id="file-div" class="gap36">
                            <label for="file-upload" class="hover-effect-not-scale">Wybierz plik</label>
                            <p id="file-name" class="pad6">Nie wybrano pliku</p>
                            <input id="file-upload" name="file" type="file" style="display: none;" />
                        </div>
                        <?php if (isset($messages['type']) || isset($messages['size']) || isset($messages['warningImage'])): ?>
                            <div class="messages">
                                <?php if (isset($messages['warningImage'])): ?>
                                    <p><i class="fa-solid fa-triangle-exclamation"></i><?= $messages['warningImage'] ?></p>
                                <?php endif; ?>
                                <?php if (isset($messages['type'])): ?>
                                    <p><i class="fa-solid fa-triangle-exclamation"></i><?= $messages['type'] ?></p>
                                <?php endif; ?>
                                <?php if (isset($messages['size'])): ?>
                                    <p><i class="fa-solid fa-triangle-exclamation"></i><?= $messages['size'] ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="flex-center">
                        <button id="form-submit-button" type="submit" class="hover-effect pad6">Dodaj koktajl</button>
                    </div>
                </div>

            </form>
        </section>
    </main>

    <?php include('templates/footer.php'); ?>
</body>

<template id="ingredient-template">
    <div class="ingredient-container">
        <select name="ingredientsNames[]" class="ingredients-select hover-effect-not-scale pad6">
            <option value="" selected disabled hidden></option>
        </select>
        <input name="ingredientsCounts[]" type="number" min="1" max="3000"
            class="count-select hover-effect-not-scale pad6">
        <select name="ingredientsUnits[]" class="unit-select hover-effect-not-scale pad6">
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
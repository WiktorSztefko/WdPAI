<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail King - Rejestracja</title>
    <link rel="icon" type="image/png" href="public/images/photos/favicon.png">

    <link rel="stylesheet" href="public/styles/index.css">
    <link rel="stylesheet" href="public/styles/log-reg.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300public800;1,300public800&family=Roboto:ital,wght@0,100public900;1,100public900&family=Rubik:ital,wght@0,300public900;1,300public900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/scripts/registerValidation.js" defer></script>
    
</head>

<body id="login-page">

    <div id="panel-img">
        <img src="public/images/photos/register.jpeg" alt="" class="images-fit">
    </div>

    <div id="panel-form" class="flex-center">
        <form action="register" method="POST">
            <img id="logo" src="public/images/photos/logo.jpeg" alt="" class="images-fit">
            <h1 class="header-text">Cocktail King</h1>

            <div class="input-icon-div">
                <input type="text" placeholder="Imie" name="name" class="hover-effect-not-scale" value="<?php if(isset($messages["value_name"])) echo $messages["value_name"];?>">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="messages">
                <?php if(isset($messages["error_name"])) { echo $messages["error_name"];}?>
            </div>
            
            <div class="input-icon-div">
                <input type="text" placeholder="Nazwisko" name="surname" class="hover-effect-not-scale" value="<?php if(isset($messages["value_surname"])) echo $messages["value_surname"];?>">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="messages">
                <?php if(isset($messages["error_surname"])) { echo $messages["error_surname"];}?>
            </div>

             <div class="input-icon-div">
                <input type="text" placeholder="Nazwa użytkownika" name="username" class="hover-effect-not-scale" value="<?php if(isset($messages["value_username"])) echo $messages["value_username"];?>">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="messages">
                <?php if(isset($messages["error_username"])) { echo $messages["error_username"];}?>
            </div>

            <div class="input-icon-div">
                <input type="email" placeholder="Adres email" name="email" class="hover-effect-not-scale" value="<?php if(isset($messages["value_email"])) echo $messages["value_email"];?>">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="messages">
                <?php if(isset($messages["error_email"])) { echo $messages["error_email"];}?>
            </div>

            <div class="input-icon-div">
                <input type="password" placeholder="Hasło" name="password" class="hover-effect-not-scale">
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="messages">
                <?php if(isset($messages["error_password"])) { echo $messages["error_password"];}?>
            </div>

            <div class="input-icon-div">
                <input type="password" placeholder="Ponów hasło" name="confirmedPassword" class="hover-effect-not-scale">
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="messages">
                <?php if(isset($messages["error_confirmedPassword"])) { echo $messages["error_confirmedPassword"];}?>
            </div>

            <button type="submit" class="hover-effect"><i class="fa-solid fa-arrow-right-to-bracket"></i>Utwórz konto</button>
        </form>
    </div>

</body>

</html>
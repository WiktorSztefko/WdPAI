<!DOCTYPE html>
<html lang="pl">

<head>
    <?php include('templates/metaHeader.php'); ?>
    <?php include('templates/log-regRedirection.php'); ?>

    <title>Cocktail King - Login</title>

    <link rel="stylesheet" href="public/styles/log-reg.css">

    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>

</head>

<body id="login-page">

    <div id="panel-img">
        <img src="public/images/photos/login.jpeg" alt="login" class="images-fit">
    </div>

    <div id="panel-form" class="flex-center">
        <form action="login" method="POST" class="flex-center flex-column">
            <a href="login">
                <img id="logo" src="public/images/photos/logo.jpeg" alt="logo">
            </a>
            <h1 class="header-text">Cocktail King</h1>
            <div class="input-icon-div">
                <input type="email" placeholder="Adres email" name="email" class="hover-effect-not-scale" value="<?php if (isset($messages["value_email"]))
                    echo $messages["value_email"]; ?>">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-icon-div">
                <input type="password" placeholder="Hasło" name="password" class="hover-effect-not-scale">
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="messages">
                <?php if (isset($messages["error_login"])): ?>
                    <p><i class="fa-solid fa-circle-exclamation"></i><?= $messages["error_login"] ?></p>
                <?php endif; ?>
            </div>

            <button type="submit" class="hover-effect">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>Zaloguj się
            </button>

            <div>
                <p>Nie masz konta? <a href="register" class="hover-effect">zarejestruj się</a></p>
            </div>
        </form>
    </div>

</body>

</html>
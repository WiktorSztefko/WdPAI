<!DOCTYPE html>
<html lang="pl">

<head>
    <?php include('templates/metaHeader.php'); ?>
    <?php include('templates/log-regRedirection.php'); ?>

    <title>Cocktail King - Rejestracja</title>

    <link rel="stylesheet" href="public/styles/log-reg.css">

    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <script type="module" src="public/scripts/registerValidation.js" defer></script>

</head>

<body id="login-page">

    <div id="panel-img">
        <img src="public/images/photos/register.jpeg" alt="register" class="images-fit">
    </div>

    <div id="panel-form" class="flex-center">
        <form action="register" method="POST" class="flex-center flex-column">
            <a href="login">
                <img id="logo" src="public/images/photos/logo.jpeg" alt="logo" class="images-fit">
            </a>
            <h1 class="header-text">Cocktail King</h1>

            <div class="input-icon-div">
                <input type="text" placeholder="Imie" name="name" class="hover-effect-not-scale" maxlength="30"
                    value="<?= isset($messages['value_name']) ? ($messages['value_name']) : '' ?>">
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-icon-div">
                <input type="text" placeholder="Nazwisko" name="surname" class="hover-effect-not-scale" maxlength="30"
                    value="<?= isset($messages['value_surname']) ? ($messages['value_surname']) : '' ?>">
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-icon-div">
                <input type="text" placeholder="Nazwa użytkownika" name="username" class="hover-effect-not-scale"
                    maxlength="20"  value="<?= isset($messages['value_username']) ? ($messages['value_username']) : '' ?>">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="messages">
                <?php if (isset($messages["warningUsername"])): ?>
                    <p><i class="fa-solid fa-circle-exclamation"></i><?= $messages["warningUsername"] ?></p>
                <?php endif; ?>
            </div>

            <div class="input-icon-div">
                <input type="email" placeholder="Adres email" name="email" class="hover-effect-not-scale"
                    maxlength="100"  value="<?= isset($messages['value_email']) ? ($messages['value_email']) : '' ?>">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="messages">
                <?php if (isset($messages["warningEmail"])): ?>
                    <p><i class="fa-solid fa-circle-exclamation"></i><?= $messages["warningEmail"] ?></p>
                <?php endif; ?>
            </div>

            <div class="input-icon-div">
                <input type="password" placeholder="Hasło" name="password" class="hover-effect-not-scale">
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="input-icon-div">
                <input type="password" placeholder="Ponów hasło" name="confirmedPassword"
                    class="hover-effect-not-scale">
                <i class="fa-solid fa-lock"></i>
            </div>

            <button type="submit" class="hover-effect"><i class="fa-solid fa-arrow-right-to-bracket"></i>Utwórz
                konto</button>
        </form>
    </div>

</body>

</html>
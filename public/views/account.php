<!DOCTYPE html>
<html lang="pl">

<head>
    <?php include('templates/metaHeader.php'); ?>

    <title>Cocktail King - Moje konto</title>

    <link rel="stylesheet" href="public/styles/account.css">

    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>

    <?php include('templates/redirection.php'); ?>

</head>

<body>
    <?php include('templates/header.php'); ?>
    <?php include('templates/currentUser.php'); ?>

    <main>
        <?php include('templates/nav.php'); ?>

        <section>
            <h1 class="header-text">Szczegóły konta</h1>
            <div class='line'>
                <p class='text-bold'>Imie: </p>
                <p><?= htmlentities($_SESSION['user']->getName(), ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <div class='line'>
                <p class='text-bold'>Nazwisko: </p>
                <p><?= htmlentities($_SESSION['user']->getSurname(), ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <div class='line'>
                <p class='text-bold'>Username: </p>
                <p><?= htmlentities($_SESSION['user']->getUsername(), ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <div class='line'>
                <p class='text-bold'>Email: </p>
                <p><?= htmlentities($_SESSION['user']->getEmail(), ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <div class='line'>
                <p class='text-bold'>Typ konta: </p>
                <p>
                    <?php
                    $roles = [];
                    foreach ($_SESSION['user']->getNameRole() as $role) {
                        $roles[] = $role['name_role'];
                    }
                    echo implode(', ', $roles);
                    ?>
                </p>
            </div>
            <div id="button-container">
                <a href="logout">
                    <button class='hover-effect'>
                        <i class="fa-solid fa-arrow-right-to-bracket mobile-logout-icon"></i>Wyloguj
                    </button>
                </a>
            </div>
        </section>
    </main>

    <?php include('templates/footer.php'); ?>
</body>

</html>
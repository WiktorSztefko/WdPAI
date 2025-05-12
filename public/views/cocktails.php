<!DOCTYPE html>
<html lang="pl">

<head>
    <?php include('templates/metaHeader.php'); ?>
    <?php include('templates/redirection.php'); ?>

    <title>Cocktail King - Koktajle</title>

    <link rel="stylesheet" href="public/styles/alcohols-cocktails.css">

    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <script src="public/scripts/search.js" defer></script>

</head>

<body>
    <?php include('templates/header.php'); ?>
    <?php include('templates/currentUser.php'); ?>

    <main>
        <?php include('templates/nav.php'); ?>

        <div id="content-container">
            <div id="search-container">
                <input type="text" id="search-input" placeholder="Szukaj" class="hover-effect-not-scale">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <section class="cards">
                <?php foreach ($cocktails as $cocktail): ?>
                    <a href="cocktail?name=<?= $cocktail->getName(); ?>">
                        <figure class="card hover-effect flex-column">
                            <img src="public/images/cocktails/<?= $cocktail->getImage(); ?>"
                                alt="<?= $cocktail->getImage(); ?>">
                            <figcaption><?= $cocktail->getName(); ?></figcaption>
                        </figure>
                    </a>
                <?php endforeach; ?>
            </section>
        </div>
    </main>

    <?php include('templates/footer.php'); ?>
</body>

</html>

<template id="cocktail-template">
    <a href="">
        <figure class="card hover-effect flex-column">
            <img src="">
            <figcaption></figcaption>
        </figure>
    </a>
</template>
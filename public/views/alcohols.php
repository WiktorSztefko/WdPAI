<!DOCTYPE html>
<html lang="pl">

<head>
    <?php include('templates/metaHeader.php'); ?>
    <?php include('templates/redirection.php'); ?>

    <title>Cocktail King - Alkohole</title>

    <link rel="stylesheet" href="public/styles/alcohols-cocktails.css">

    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php include('templates/header.php'); ?>
    <?php include('templates/currentUser.php'); ?>

    <main>
        <?php include('templates/nav.php'); ?>

        <section class="cards">
            <?php foreach ($alcohols as $alcohol): ?>
                <a href="alcohols">
                    <figure class="card hover-effect flex-column">
                        <img src="public/images/alcohols/<?= $alcohol->getImage(); ?>" alt="<?= $alcohol->getImage(); ?>">
                        <figcaption><?= $alcohol->getName(); ?></figcaption>
                    </figure>
                </a>
            <?php endforeach; ?>
        </section>
    </main>

    <?php include('templates/footer.php'); ?>
</body>

</html>
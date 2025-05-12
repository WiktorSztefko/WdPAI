<!DOCTYPE html>
<html lang="pl">

<head>
    <?php include('templates/metaHeader.php'); ?>
    <?php include('templates/redirection.php'); ?>

    <title>Cocktail King - Koktajl</title>

    <link rel="stylesheet" href="public/styles/cocktail.css">
 
    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <script src="public/scripts/statistics.js" defer></script>

</head>

<body>
    <?php include('templates/header.php'); ?>
    <?php include('templates/currentUser.php'); ?>

    <main>
        <?php include('templates/nav.php'); ?>

        <section class="flex-column flex-center">
            <div id="coctail-image-div">
                <img src="public/images/cocktails/<?= $item->getImage(); ?>" alt="<?= $item->getImage(); ?>"
                    class="hover-effect-not-scale images-fit">
            </div>
            <h1><?= $item->getName(); ?></h1>
            <div id=<?= $item->getId(); ?> class="likes flex-center">
                <i class="fa-heart hover-effect"></i>
                <p id="likes-count"><?= $item->getLikes() ?></p>
            </div>
            <h2 class="stars">
                <?php
                $count = $item->getDifficultyLevel();
                for ($i = 0; $i < $count; $i++): ?>
                    <i class="fa-solid fa-star"></i>
                <?php endfor; ?>
                <?php
                for ($i = 5 - $count; $i > 0; $i--): ?>
                    <i class="fa-regular fa-star"></i>
                <?php endfor; ?>
            </h2>
            <p>
                <?= $item->getDescription(); ?>
            </p>
        </section>

        <aside class="flex-column">
            <h2>Składniki:</h2>
            <ul>
                <?php foreach ($item->getIngredients() as $elem): ?>
                    <li><?= $elem['name_ingredient'] . " " . $elem['quantity'] . " " . $elem['name_unit']; ?></li>
                <?php endforeach; ?>
            </ul>
            <h2>Przygotowanie:</h2>
            <ul>
                <?php
                $instructions = rtrim($item->getPreparationInstruction(), ".");
                $instructions = explode(".", $instructions);
                foreach ($instructions as $elem): ?>
                    <li><?= $elem; ?></li>
                <?php endforeach; ?>
            </ul>
            <h2>Ciekawostka: </h2>
            <p><?= $item->getFunFact(); ?></p>
        </aside>
    </main>

    <?php include('templates/footer.php'); ?>
</body>

</html>
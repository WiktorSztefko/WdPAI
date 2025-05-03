<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail King - Koktajl</title>
    <link rel="icon" type="image/png" href="public/images/photos/favicon.png">

    <link rel="stylesheet" href="public/styles/index.css">
    <link rel="stylesheet" href="public/styles/item.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300public800;1,300public800&family=Roboto:ital,wght@0,100public900;1,100public900&family=Rubik:ital,wght@0,300public900;1,300public900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <header>
        <a href="main" class="flex-center">
            <img id="logo" src="public/images/photos/logo.jpeg" alt="" class="images-fit">
            <h1 class="header-text">Cocktail King</h1>
        </a>
    </header>

    <main>
        <div id="left-banner">
            <nav>
                <ul class="desktop-icons">
                    <li class="hover-effect">
                        <a href="main">
                            <i class="fa-solid fa-house"></i>
                            <span>Strona główna</span>
                        </a>
                    </li>
                    <li class="hover-effect">
                        <a href="cocktails">
                            <i class="fa-solid fa-martini-glass"></i>
                            <span>Koktajle</span>
                        </a>
                    </li>
                    <li class="hover-effect">
                        <a href="alcohols">
                            <i class="fa-solid fa-whiskey-glass"></i>
                            <span>Alkohole</span>
                        </a>
                    </li>
                    <li class="hover-effect">
                        <a href="">
                            <i class="fa-solid fa-user"></i>
                            <span>Moje konto</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <section>
            <div id="coctail-image-div">
                <img src="public/images/cocktails/<?php echo $item->getImage();?>" alt="" class="hover-effect-not-scale images-fit">
            </div>
            <h1><?php echo $item->getName();?></h1>
            <h2 class="stars">
                <?php 
                    $count = $item->getDifficultyLevel();
                    for ($i = 0; $i < $count; $i++): ?>
                        <i class="fa-solid fa-star"></i>
                <?php endfor; ?>
                <?php 
                    for ($i = 5 - $count; $i > 0 ; $i--): ?>
                        <i class="fa-regular fa-star"></i>
                <?php endfor; ?>
            </h2>
            <p>
               <?php echo $item->getDescription(); ?>
            </p>
        </section>

        <aside>
            <h2>Składniki:</h2>
            <ul>
                <?php foreach ($item->getIngredients() as $elem): ?>
                   <li><?php echo $elem['name_ingredient']." ".$elem['quantity']." ".$elem['name_unit']; ?></li>
               <?php endforeach; ?>
            </ul>
            <h2>Przygotowanie:</h2>
            <ul>
                <?php 
                    $instructions = rtrim($item->getPreparationInstruction(), ".");
                    $instructions  = explode(".", $instructions) ;
                    foreach ($instructions as $elem): ?>
                        <li><?php echo $elem;?></li>
                <?php endforeach; ?>
            </ul>
            <h2>Ciekawostka: </h2>
            <p><?php echo $item->getFunFact(); ?></p>
        </aside>
    </main>

    <footer>
        <span>Wyjątkowe koktajle, niezapomniane chwile – smakuj życie z każdym łykiem</span>
    </footer>

</body>

</html>
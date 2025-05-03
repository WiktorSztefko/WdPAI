<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail King - Strona główna</title>
    <link rel="icon" type="image/png" href="public/images/photos/favicon.png">

    <link rel="stylesheet" href="public/styles/index.css">
    <link rel="stylesheet" href="public/styles/main.css">

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
            </nav>
        </div>

        <section id="slider">
            <div id="slides">
                <img src="public/images/slider/1.jpg" alt="" class="slide">
                <img src="public/images/slider/2.jpg" alt="" class="slide">
                <img src="public/images/slider/3.jpg" alt="" class="slide">
                <img src="public/images/slider/4.jpg" alt="" class="slide">
                <img src="public/images/slider/5.jpg" alt="" class="slide">
                <img src="public/images/slider/1.jpg" alt="" class="slide">
            </div>
        </section>

        <aside class="flex-center">
            <h2><span>Mistrz</span><span>Barmańskiej</span><span>Sztuki</span></h2>
            <button class="hover-effect">Wylosuj Zadanie</button>
        </aside>
    </main>

    <div id="alko-bar">
        <div class="image-container">
            <img src="public/images/cocktails/old fashioned.jpeg" alt="">
            <div class="overlay flex-center"><span class="title">OLD FASHIONED</span>Jeden z najstarzych koktaili
                świata, jego historia sięga początku XVIII wieku</div>
        </div>
        <div class="image-container">
            <img src="public/images/cocktails/lynchburg lemonade.jpeg" alt="">
            <div class="overlay flex-center"><span class="title">LYNCHBURG LEMONADE</span>Nazwa Lynchburg pochodzi od
                miejscowości, w której powstaje Jack Daniels</div>
        </div>
        <div class="image-container">
            <img src="public/images/cocktails/basil smash.jpeg" alt="">
            <div class="overlay flex-center"><span class="title">BASIL SMASH</span>Koktajl powstał dopiero w 2008 roku,
                swój intrygujący kolor zawdzięcza właśnie bazylii</div>
        </div>
        <div class="image-container">
            <img src="public/images/cocktails/amf.jpeg" alt="">
            <div class="overlay flex-center"><span class="title">AMF</span>Adios, Motherfucker... parafraza słów
                barmana po przygotowaniu tego mega mocnego drinka</div>
        </div>
    </div>


    <footer>
        <span>Wyjątkowe koktajle, niezapomniane chwile – smakuj życie z każdym łykiem</span>
    </footer>

</body>

</html>
<!DOCTYPE html>
<html lang="pl">

<head>
    <?php include('templates/metaHeader.php'); ?>
    <?php include('templates/redirection.php'); ?>

    <title>Cocktail King - Strona główna</title>

    <link rel="stylesheet" href="public/styles/main.css">
  
    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <script src="public/scripts/tasks.js" defer></script>

</head>

<body>
    <?php include('templates/header.php'); ?>
    <?php include('templates/currentUser.php'); ?>

    <main>
        <?php include('templates/nav.php'); ?>

        <section id="slider">
            <div id="slides">
                <a href="cocktails"><img src="public/images/slider/1.jpg" alt="slide1" class="slide"></a>
                <a href="alcohols"><img src="public/images/slider/2.jpg" alt="slide2" class="slide"></a>
                <a href="cocktails"><img src="public/images/slider/3.jpg" alt="slide3" class="slide"></a>
                <a href="alcohols"><img src="public/images/slider/4.jpg" alt="slide4" class="slide"></a>
                <a href="cocktails"><img src="public/images/slider/5.jpg" alt="slide5" class="slide"></a>
                <a href="alcohols"><img src="public/images/slider/1.jpg" alt="slide6" class="slide"></a>
            </div>
        </section>

        <aside class="flex-column">
            <h2><span>Mistrz</span><span>Barmańskiej</span><span>Sztuki</span></h2>
            <button id="button-task" class="hover-effect">Wylosuj Zadanie</button>
        </aside>
    </main>

    <div id="alko-bar">
        <div class="image-container">
            <img src="public/images/cocktails/old fashioned.jpeg" alt="old fashioned">
            <div class="overlay flex-center"><span class="title">OLD FASHIONED</span>Jeden z najstarzych koktaili
                świata, jego historia sięga początku XVIII wieku</div>
        </div>
        <div class="image-container">
            <img src="public/images/cocktails/lynchburg lemonade.jpeg" alt="lynchburg lemonade">
            <div class="overlay flex-center"><span class="title">LYNCHBURG LEMONADE</span>Nazwa Lynchburg pochodzi od
                miejscowości, w której powstaje Jack Daniels</div>
        </div>
        <div class="image-container">
            <img src="public/images/cocktails/basil smash.jpeg" alt="basil smash">
            <div class="overlay flex-center"><span class="title">BASIL SMASH</span>Koktajl powstał dopiero w 2008 roku,
                swój intrygujący kolor zawdzięcza właśnie bazylii</div>
        </div>
        <div class="image-container">
            <img src="public/images/cocktails/amf.jpeg" alt="amf">
            <div class="overlay flex-center"><span class="title">AMF</span>Adios, Motherfucker... parafraza słów
                barmana po przygotowaniu tego mega mocnego drinka</div>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>
</body>

</html>
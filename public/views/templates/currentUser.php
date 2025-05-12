<div id="current-user-div">
    <div class="hover-effect">
        <a href="account">
            <i class="fa-solid fa-user"></i>
            <?=htmlentities($_SESSION['user']->getUsername(), ENT_QUOTES, "UTF-8"); ?>
        </a>
    </div>
    <div class="hover-effect">
        <a href="logout">
            <i class="fa-solid fa-arrow-right-to-bracket logout-icon"></i>
        </a>
    </div>
</div>
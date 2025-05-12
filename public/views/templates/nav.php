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
                <a href="account">
                    <i class="fa-solid fa-user"></i>
                    <span>Konto</span>
                </a>
            </li>
            <?php if ($isAdministrator): ?>
                <li class="hover-effect">
                    <a href="upload">
                        <i class="fa-solid fa-file-arrow-up"></i>
                        <span>Upload</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
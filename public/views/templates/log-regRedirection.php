<?php

session_start();
if (isset($_SESSION['user'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: $url/main");
}
?>
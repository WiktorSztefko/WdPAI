<?php

session_start();
if (!isset($_SESSION['user'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: $url/login");
}

$roles = $_SESSION['user']->getNameRole();
$roleNames = array_column($roles, 'name_role');
$isAdministrator = in_array('administrator', $roleNames);
?>
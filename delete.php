<?php
require __DIR__ . "/users/user.php";
include "partials/header.php";

if (!isset($_POST['id'])) {
    include "partials/404.php";
    exit;
}
$userId = $_POST['id'];
deleteUser($userId);

header("Location: index.php");
?>
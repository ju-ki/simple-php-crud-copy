<?php

require __DIR__ . "/users/user.php";
include "partials/header.php";

if (!isset($_GET['id'])) {
    include "partials/404.php";
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);
if (!$user) {
    include "partials/404.php";
    exit;
}

$error = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user = array_merge($user, $_POST);
    $isValid = validUser($user, $error);
    if($isValid)
    {
        $users = updateUser($_POST, $userId);
        uploadImage($_FILES["picture"], $user);
        header("Location: index.php");
    }
}

?>

<?php include "_form.php";?>
<?php

require __DIR__ . "/users/user.php";
include "partials/header.php";


$user = [
    'id'=>'',
    'name'=>'',
    'username'=>'',
    'email'=>'',
    'phone'=>'',
    'website'=>'',
];

$error = [
    "name"=> "",
    "username" => "",
    "email" => "",
    "phone" => "",
    "website" => "",
];

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $user = array_merge($user, $_POST);
    $isValid = validUser($user, $error);
    if($isValid)
    {
        $user = createUser($_POST);
        uploadImage($_FILES["picture"], $user);
        header("Location: index.php");
    }

}
?>

<?php include "_form.php";?>
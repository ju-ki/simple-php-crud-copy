<?php

function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . "/users.json"), true);
}


function getUserById($id)
{
    $users = getUsers();
    foreach($users as $user)
    {
        if ($user['id'] == $id)
        {
            return $user;
        }
    }
    return null;
}


function createUser($data)
{
    $users = getUsers();
    $data['id'] = rand(10000, 200000);
    $users[] = $data;
    putJson($users);
    return $data;
}

function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach($users as $i=> $user)
    {
        if ($user['id'] == $id)
        {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }
    putJson($users);
    return $updateUser;
}


function putJson($users)
{
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

function deleteUser($id)
{
    $users = getUsers();
    foreach($users as $i => $user)
    {
        if($user['id'] == $id)
        {
            array_splice($users, $i, 1);
        }
    }
    putJson($users);
}


function uploadImage($file, $user)
{
    if(isset($_FILES["picture"]) && $_FILES["picture"]["name"])
    {
        if(!is_dir(__DIR__ . "/images"))
        {
            mkdir(__DIR__ . "/images");
        }
        $fileName = $_FILES["picture"]["name"];
        $dotPosition = strpos($fileName, '.');
        $extension = substr($fileName, $dotPosition + 1);
        move_uploaded_file($file["tmp_name"], __DIR__ . "/images/{$user['id']}.$extension");
        $users["extension"] = $extension;
        updateUser($users, $user['id']);
    }
}


function validUser($user, &$error)
{
    $isValid = true;
    if(strlen($user["name"]) < 1 || strlen($user["name"] > 16))
    {
        $isValid = false;
        $error["name"] = "name is invalid";
    }
    if(strlen($user["username"]) < 1 || strlen($user["username"] > 16))
    {
        $isValid = false;
        $error["username"] = "username is invalid";
    }
    if(!filter_var($user["email"], FILTER_VALIDATE_EMAIL))
    {
        $isValid = false;
        $error["email"] = "email is invalid";
    }
    if(!filter_var(intval($user["phone"]), FILTER_VALIDATE_INT))
    {
        $isValid = false;
        $error["phone"] = "phone is invalid";
    }
    // if(!filter_var($user["website"], FILTER_VALIDATE_URL))
    // {
    //     $isValid = false;
    //     $error["website"] = "website is invalid";
    // }

    return $isValid;
}
?>
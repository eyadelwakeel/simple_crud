<?php

include 'partials/header.php';
require __DIR__.'/users/users.php';


$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
    'extention' => '',
];

if ($_SERVER['REQUEST_METHOD']==="POST")
{
    $user=array_merge($user,$_POST);
    $user=createUser($_POST);

    uploadImage($_FILES['picture'],$user);

    header("Location: index.php");

}

include 'form.php';
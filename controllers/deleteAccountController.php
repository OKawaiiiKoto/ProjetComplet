<?php 
session_start();
require_once '../models/usersModel.php';


    $drop = new users;
    $drop->id = $_SESSION['user']['id'];
    $drop->deleteAccount();


    unset($_SESSION);
    session_destroy();
    header('Location:/accueil');
    exit;


    require_once '../views/parts/header.php';
    require_once '../views/deleteAccounts';
    require_once '../views/parts/footer.php';
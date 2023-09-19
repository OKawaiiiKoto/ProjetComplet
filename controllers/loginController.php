<?php
session_start();

$formErrors = [];

require_once '../models/usersModel.php';

if (count($_POST) > 0) {
    $user = new users();

    if (!empty($_POST['username'])) {
            $user->username = $_POST['username'];
            if ($user->checkUsernameAvaibility() == 0) {
                $formErrors['username'] = $formErrors['password'] = 'L\'username ou le mot de passe est incorrect.';
            }
    } else {
        $errors['username'] = 'L\'username est obligatoire';
    }
    if (!empty($_POST['password'])) {
        if (!isset($formErrors['username'])) {
            $user->password = $user->getHash();
            if (password_verify($_POST['password'], $user->password)) {
                $_SESSION['user'] = $user->getInfos();
                 header('Location:users');
                 exit;
            } else {
                $formErrors['username'] = $formErrors['password'] = 'L\'username ou le mot de passe est incorrect. 2';
            }
        }
    } else {
        $formErrors['password'] = 'Le mot de passe est obligatoire';
    }
}
//var_dump($_SESSION);
require_once '../views/parts/header2.php';
require_once '../views/login.php';
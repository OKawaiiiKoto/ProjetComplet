<?php
session_start();

$formErrors = [];

require_once '../models/usersModel.php';
require_once '../errors.php';

if (count($_POST) > 0) {
    $user = new users();

    if (!empty($_POST['username'])) {
            $user->username = $_POST['username'];
            if ($user->checkUsernameAvaibility() == 0) {
                $formErrors['username'] = $formErrors['password'] = ERROR_USERS_LOGIN;
            }
    } else {
        $errors['username'] = ERROR_USERS_USERNAME_WRONG;
    }
    if (!empty($_POST['password'])) {
        if (!isset($formErrors['username'])) {
            //"hash" transforme en une chaîne de caractères de longueur fixe, généralement de longueur fixe
            $user->password = $user->getHash();
            if (password_verify($_POST['password'], $user->password)) {
                $_SESSION['user'] = $user->getInfos();
                 header('Location:/connect');
                 exit;
            } else {
                $formErrors['username'] = $formErrors['password'] = ERROR_USERS_LOGIN;
            }
        }
    } else {
        $formErrors['password'] = ERROR_USERS_PASSWORD_WRONG;
    }
}
//var_dump($_SESSION);
require_once '../views/parts/header2.php';
require_once '../views/login.php';
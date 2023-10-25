<?php 
session_start();

require_once '../models/usersModel.php';
require_once '../errors.php';


$regex = [
    'username' => '/^(?=.*[a-zA-Z]{3,})[a-zA-Z0-9-]+$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?\.&])[A-Za-z\d@$!%*?\.&]{8,}$/',
];

$formErrors = [];

$user = new users;
$user->id = $_SESSION['user']['id'];


if (isset($_POST['updateInfos'])) {

if (!empty($_POST['username'])) {
    if (preg_match($regex['username'],$_POST['username'])) {
        $user->username = strip_tags($_POST['username']);
    } else {
        $formErrors['username'] = ERROR_USERS_USERNAME_INVALID;
    }
} else {
    $formErrors['username'] = ERROR_USERS_USERNAME_EMPTY;
}

if (!empty($_POST['email'])) {
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $user->email = strip_tags($_POST['email']);
        try {
            if($user->checkIfExistsByEmail() == 1 && $user->email !=$_SESSION['user']['email']) {
                $formErros['email'] = ERROR_USERS_EMAIL_ALREADY_EXISTS;
            } 
        } catch (PDOException $e) {
            $formErrors['email'] = ERROR_GENERAL;
        }
    } else {
        $formErrors = ERROR_USERS_EMAIL_INVALID;
    }
} else {
    $formErrors['email'] = ERROR_USERS_EMAIL_EMPTY;
}

if(count($formErrors) == 0) {
    try {
        if ($user->update()) {
            $_SESSION['user']['username'] = $user->username;
            $_SESSION['user']['email'] = $user->email;
            $success['infos'] = SUCCESS_USERS_UPDATE;
        }
    } catch (PDOException $e) {
        $formErrors['general'] = ERROR_GENERAL;
    }
}
}

if(isset($_POST['updatePassword'])) {
    if(!empty($_POST['currentPassword'])) {
        $user->username = $_SESSION['user']['username'];
        $password = $user->getHash();
        if(!password_verify($_POST['currentPassword'] , $password)) {
            $formErrors['currentPassword'] = ERROR_USERS_PASSWORD_WRONG;
        }
    } else {
        $formErrors['currentPassword'] = ERROR_USERS_PASSWORD_EMPTY;
    }


    if(!empty($_POST['password'])){
        if(!preg_match($regex['password'], $_POST['password'])) {
            $formErrors['password'] = ERROR_USERS_PASSWORD_INVALID;
        }
    } else {
        $formErrors = ERROR_USERS_PASSWORD_EMPTY;
    }

if(!empty($_POST['passwordConfirm'])) {
    if(!isset($formErrors['password'])){
        if($_POST['password'] == $_POST['passwordConfirm']) {
            $user->password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        } else {
            $formErrors['password'] = ERROR_USERS_PASSWORD_DIFFERENT;
        }
    } 
} else  {
    $formErrors['passwordConfirm'] = ERROR_USERS_PASSWORD_CONFIRMATION_EMPTY;
}

if(count($formErrors) == 0) {
    try {
        if($user->updatePassword()) {
            $success['password'] = SUCCESS_USERS_UPDATE_PASSWORD;
        }
    } catch (PDOException $e) {
        $formErrors['general'] = ERROR_GENERAL;
    }
  }
  header('Location:/connect');
    exit;
}

if (isset($_POST['deleteAccount'])) {
    if($user->deleteAccount()){
        
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /accueil');
        exit;
    }
  }


$userInfos = $user->getOneById();

require_once '../views/parts/header2.php';
require_once '../views/changeInfos.php';

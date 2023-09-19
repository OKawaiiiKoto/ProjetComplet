<?php
require_once '../models/usersModel.php';
//var_dump($_POST);

$regex = [
    'username' => '/^(?=.[a-zA-Z]{3,})[a-zA-Z0-9-]+$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    'birthdate' => '/^[0-9]{4}(-[0-9]{2}){2}$/',
];

$formErrors = [];

if (count($_POST) > 0) {
    $user = new users;
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = strip_tags($_POST['email']);
            try {
                if ($user->checkEmailAvaibility() == 1) {
                    $formErrors['email'] = 'l\'adresse mail est deja utilise.';
                }
            } catch (PDOException $e) {
                // echo $e->getMessage();
                $formErrors['general'] = 'Une erreur est survenue , l\'admin a été prévenu';
            }
        } else {
            $formErrors['email'] = 'Votre adresse mail n\'est pas valide. Elle ne peut comporter que des lettres , tirets , underscores , points et un caractère spécial.';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre adresse e-mail.';
    }
    if (!empty($_POST['username'])) {
        if (preg_match($regex['username'], $_POST['username'])) {
            $user->username = strip_tags($_POST['username']);
            try {
                if ($user->checkUsernameAvaibility() == 1) {
                    $formErrors['username'] = 'l\'username est deja utilise.';
                } 
            } catch (PDOException $e) {
                // echo $e->getMessage();
                $formErrors['general'] = 'Une erreur est survenue , l\'admin a été prévenu';
            }
        } else {
            $formErrors['username'] = 'Veuillez renseigner votre nom d\'utilisateur.';
        }
    if (!empty($_POST['password'])) {
        if (!preg_match($regex['password'], $_POST['password'])) {
            $formErrors['password'] = 'Votre mdp n\'est pas valide. il doit co.';
        }
    }
    if (!empty($_POST['passwordConfirm'])) {
        if (!isset($formErrors['password'])) {
            if ($_POST['password'] == $_POST['passwordConfirm']) {
                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                $formErrors['password'] = $formErrors['passwordConfirm'] = 'Les mdps ne correspondent pas.';
            }
        }
    } else {
        $formErrors['passwordConfirm'] = 'Veuillez confirmer votre mdp';
    }
    if (!empty($_POST['birthdate'])) {
        if (preg_match($regex['birthdate'], $_POST['birthdate'])) {
            $date = explode('-', $_POST['birthdate']);
            if (checkdate($date[1], $date[2], $date[0])) {
                $user->birthdate = $_POST['birthdate'];
            } else {
                $formErrors['birthdate'] = 'Votre date de naissance n\'est pas valide.Elle doit etre au format jj/mm/aaaa';
            }
        } else {
            $formErrors['birthdate'] = 'Votre date de naissance n\'est pas valide.Elle doit etre au format jj/mm/aaaa';
        }
    } else {
        $formErrors['birthdate'] = 'Veuillez renseigner votre date de naissance';
    }
    if (count($formErrors) == 0) {
        try {
            if ($user->add()) {
                $succes = true;
            }
           header('Location:/connexion');
           exit;
        } catch (PDOException $e) {
            $formErrors['general'] = 'Une erreur est survenue , l\'admin a été prévenu';
        }
    }
    //var_dump($formErrors);
}
}
//var_dump($_POST);
require_once '../views/parts/header2.php';
require_once '../views/register.php';
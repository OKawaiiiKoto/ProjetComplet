<?php
session_start();

require_once '../models/usersModel.php';
require_once '../errors.php';

//var_dump($_POST);

/*Un tableau $regex est défini, contenant des expressions régulières pour valider certains champs du formulaire,
 tels que le nom d'utilisateur, le mot de passe et la date de naissance.*/
$regex = [
    'username' => '/^(?=.[a-zA-Z]{3,})[a-zA-Z0-9-]+$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    'birthdate' => '/^[0-9]{4}(-[0-9]{2}){2}$/',
];

/*Initialisation de '$formErrors' pour stocker les erreurs éventuelles du formulaire.le tableau est utilisé pour 
collecter et afficher les erreurs rencontrées lors de la validation des données du formulaire.*/

$formErrors = [];
/*Le code vérifie d'abord si des données ont été soumises via la méthode POST en utilisant if (count($_POST) > 0). 
Si des données ont été soumises, le traitement du formulaire commence.*/
if (count($_POST) > 0) {
    $user = new users;
    /*Le code vérifie d'abord le champ "email" en vérifiant s'il est vide et s'il correspond à un format valide. 
    Si le champ est valide,il est stocké dans l'objet $user. 
    Ensuite, il vérifie si l'adresse e-mail est déjà utilisée dans la base de données. 
    Si c'est le cas, une erreur est ajoutée au tableau $formErrors. */
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = strip_tags($_POST['email']);
            try {
                if ($user->checkEmailAvaibility() == 1) {
                    $formErrors['email'] = ERROR_USERS_EMAIL_ALREADY_EXISTS;
                }
            } catch (PDOException $e) {
                // echo $e->getMessage();
                $formErrors['general'] = ERROR_GENERAL;
            }
        } else {
            $formErrors['email'] = ERROR_USERS_EMAIL_INVALID;
        }
    } else {
        $formErrors['email'] = ERROR_USERS_EMAIL_EMPTY;
    }
    if (!empty($_POST['username'])) {
        if (preg_match($regex['username'], $_POST['username'])) {
            $user->username = strip_tags($_POST['username']);
            try {
                if ($user->checkUsernameAvaibility() > 0) {
                    $formErrors['username'] = ERROR_USERS_USERNAME_ALREADY_EXISTS;
                }
            } catch (PDOException $e) {
                // echo $e->getMessage();
                $formErrors['general'] = ERROR_GENERAL;
            }
        } else {
            $formErrors['username'] = ERROR_USERS_USERNAME_INVALID;
        }
    } else {
        $formErrors['username'] = ERROR_USERS_USERNAME_EMPTY;
    }

    if (!empty($_POST['password'])) {
        if (!preg_match($regex['password'], $_POST['password'])) {
            $formErrors['password'] = ERROR_USERS_PASSWORD_INVALID;
        }
    }
    if (!empty($_POST['passwordConfirm'])) {
        if (!isset($formErrors['password'])) {
            if ($_POST['password'] == $_POST['passwordConfirm']) {
                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                $formErrors['password'] = $formErrors['passwordConfirm'] = ERROR_USERS_PASSWORD_DIFFERENT;
            }
        }
    } else {
        $formErrors['passwordConfirm'] = ERROR_USERS_PASSWORD_CONFIRMATION_EMPTY;
    }
    if (!empty($_POST['birthdate'])) {
        if (preg_match($regex['birthdate'], $_POST['birthdate'])) {
            $date = explode('-', $_POST['birthdate']);
            //Le champ "birthdate" est validé pour correspondre à un format de date spécifique
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
            $formErrors['general'] = ERROR_GENERAL;
        }
    }
    //var_dump($formErrors);
}
//var_dump($_POST);
require_once '../views/parts/header2.php';

require_once '../views/register.php';

<?php

/**
 * Je vérifie que mon utilisateur est connecté car je veux que uniquement les personnes connectées puissent écrire un article (lignes 9 à 14).
 * En me connectant, je crée une variable de session ($_SESSION['user']) qui contient toutes les informations que je veux pouvoir passer de page en page. 
 * Si cette variable n'existe pas, c'est que je ne suis pas passé ou que je n'ai pas réussi à me connecter.
 * Donc si $_SESSION['user'] , n'existe pas, je renvoie l'utilisateur sur la page de connexion grâce à la fonction header. L'action est (quasi) instantanée donc transparente.
 */
session_start();

if (!isset($_SESSION['user'])) {
    header('Location:/connexion');
    exit;
}
// Fin de la vérification de la connexion

// Je charge mes modèles pour pouvoir instancier mes objets ($var = new object) et utiliser mes méthodes
require_once '../models/scansModel.php';
require_once '../errors.php';

$formErrors = [];

if (count($_POST) > 0 ) {
    $scan = new scans;


    if (!empty($_POST['chapter'])) {
        $scan->chapter = strip_tags($_POST['chapter']);
    } else {
        $formErrors['chapter'] = ERROR_USERS_GENERAL;
    }
    if (!empty($_POST['images'])) {
        $scan->images = strip_tags($_POST['images']);
    } else {
        $formErrors['images'] = ERROR_POSTS_GENERAL;
    }
}
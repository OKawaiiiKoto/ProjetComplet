<?php


require_once '../models/commentsModel.php';
require_once '../errors.php';

$formErrors = [];
//var_dump($_POST);
//Instanciation de l'objet posts
$comment = new comments;

/**
 * Compte le nombre d'éléments dans le tableau POST.
 * Si = 0, le formulaire n'est pas envoyé
 * Permet d'éviter que les vérifications se lancent au premier chargement de la page
 */
if (count($_POST) > 0) {
    //Instanciation de l'objet comments

    if (!empty($_POST['content'])) {
        $comment->content = $_POST['content'];
    } else {
        $formErrors['content'] = ERROR_COMMENTS_CONTENT_EMPTY;
    }

    $comment->id_users = $_SESSION['user']['id'];
    $comment->id_scans = 2;
    
    if(count($formErrors) == 0) {
        if($comment->add()) {
            $success = SUCCESS_COMMENTS_ADD;
        } else {
            $formErrors['general'] = ERROR_COMMENTS_GENERAL;
        }
    }
}

$commentsList = $comment->getCommentsListByScans();

require_once '../views/parts/header.php';
require_once '../views/commentsList.php';
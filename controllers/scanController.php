<?php 

//  Cette ligne démarre ou reprend la session PHP en cours. Elle est nécessaire pour utiliser les variables présentent

session_start();

require_once '../models/transaction.php';
require_once '../models/scansModel.php';
require_once '../models/imagesModel.php';
require_once '../errors.php';

//var_dump($_GET);

// $formErrors = [] --> Variable vide initialisée pour stocker les erreurs du formulaire en quoi de problème

$formErrors = [];

// Deux objets sont instanciés : $scan de la classe scans et $images de la classe images. 

$scan = new scans();
$images = new images();

if (count($formErrors) == 0) {

 /* try, une transaction est initiée avec $t->beginTransaction(). 
 Cela signifie que toutes les opérations à venir seront regroupées dans une transaction */

    try {
        $t = new transaction;
        $t->beginTransaction();
       // $chapter = $_POST['chapter'];
     // Plusieurs propriétés de l'objet $scan sont définies , à partir des valeurs de $_GET et de la SESSION['user']['id']
        $scan->chapter = 1;
        $scan->id_books = $_GET['id'];
        $scan->id_users = $_SESSION['user']['id'];
     // add() est appelée sur l'objet $scan pour récupérer les infos dans la base de données   
        $scan->add();
        $images->id_scans = $t->lastInsertId();
        $images->images = '';
     // add() est appelée sur l'objet $images pour récupérer les infos dans la base de données     
        $images->add();
        //Si toutes les étapes précédentes réussissent, la transaction est validée avec $t->commit().
        $t->commit();
        }
        catch (PDOException $e){
         /* Si une exception PDO survient (par exemple, en cas d'échec de la transaction)
         le script effectue un rollback ($t->rollBack()) et affiche le message d'erreur. */
            $t->rollBack();
            die($e->getMessage());
        }
}
//var_dump($scan);
require_once '../views/parts/header2.php';
require_once '../views/addImages.php';
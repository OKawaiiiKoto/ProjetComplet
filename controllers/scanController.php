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

if (count($_POST) > 0) {


   $arrayLength = count($_FILES['images']['error']);
   for ($key = 0; $key < $arrayLength; $key++) {

      if ($_FILES['images']['error'][$key] != 4) {

         if ($_FILES['images']['size'][$key] < 1000000) {

            if ($_FILES['images']['error'][$key] == 0) {

               $extension = pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);

               $authorizedExtension = [
                  'jpg' => 'image/jpeg',
                  'jpeg' => 'image/jpeg',
                  'png' => 'image/png',
                  'gif' => 'image/gif'
               ];


               if (array_key_exists($extension, $authorizedExtension) && mime_content_type($_FILES['images']['tmp_name'][$key]) == $authorizedExtension[$extension]) {

                  $imgs[$key] = uniqid() . '_' . date('d-m-Y') . '.' . $extension;
               } else {
                  $formErrors['image'][$key] = ERROR_POSTS_IMAGE_INVALID;
               }
            } else {
               $formErrors['image'][$key] = ERROR_POSTS_IMAGE_UPLOAD;
            }
         } else {
            $formErrors['image'][$key] = ERROR_POSTS_IMAGE_SIZE;
         }
      } else {
         $formErrors['image'][$key] = ERROR_POSTS_IMAGE_EMPTY;
      }

      if (count($formErrors) == 0) {

         if (!move_uploaded_file($_FILES['images']['tmp_name'][$key], '../assets/img/scans/' . $imgs[$key])) {
            $formErrors['image'][$key] = ERROR_POSTS_IMAGE_UPLOAD;
         }
      }
   }

   if (count($formErrors) == 0) {
      /* try repere des potentielle erreur pdo, une transaction est initiée avec $t->beginTransaction(). 
 Cela signifie que toutes les opérations à venir seront regroupées dans une transaction */

      try {
         $t = new transaction;
         $t->beginTransaction();
         // $chapter = $_POST['chapter'];
         // Plusieurs propriétés de l'objet $scan sont définies , à partir des valeurs de $_GET et de la SESSION['user']['id']
         $scan->chapter = $_POST['chapter'];
         $scan->id_books = $_GET['id'];
         $scan->id_users = $_SESSION['user']['id'];
         // add() est appelée sur l'objet $scan pour récupérer les infos dans la base de données   
         $scan->add();
         $images->id_scans = $t->lastInsertId();
         foreach ($imgs as $i) {
            $images->images = $i;
            // add() est appelée sur l'objet $images pour récupérer les infos dans la base de données     
            if (!$images->add()) {
               unlink($i);
            }
         }

        //Si toutes les étapes précédentes réussissent, la transaction est validée avec $t->commit().
         $t->commit();
      } catch (PDOException $e) {
         /* Si une exception PDO survient (par exemple, en cas d'échec de la transaction)
         le script effectue un rollback ($t->rollBack()) et affiche le message d'erreur. */
         $t->rollBack();
         die($e->getMessage());
      }
   }
          header('Location:/liste-livres');
          exit;
}
//var_dump($scan);
//var_dump($_POST);
require_once '../views/parts/header2.php';
require_once '../views/addScans.php';


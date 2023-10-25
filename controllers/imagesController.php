<?php
session_start();

require_once '../models/imagesModel.php';

/* Instanciation de la classe images est créée en utilisant l'opérateur new. 
Cette instance sera stockée dans la variable $image.*/
$image = new images;
// On appelle la méthode 'getImagesByIdScans' avec l'instaciation précédente
$imagesList = $image->get($_GET['chapter']);

//var_dump($_SESSION);

require_once '../views/parts/header.php';
require_once '../views/parts/nav2.php';
require_once '../views/scanList.php';
require_once '../controllers/commentsController.php';
require_once '../views/parts/footer2.php';
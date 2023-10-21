<?php 
session_start();

require_once '../models/scansModel.php';
require_once '../models/booksModel.php';
require_once '../errors.php';
//Instanciations des Classes des Books et Scans stockées dans les variiable $book et $scan 
$book = new books; 
$scan = new scans;
//L'id du livre est extrait à partir de la superglobale $_GET et stocké dans la propriété id de l'objet $book.
$book->id = $_GET['id'];
//: L'id du livre est également stocké dans la propriété id_books de l'objet $scan.
$scan->id_books = $_GET['id'];
/*Méthode 'checkIfExists' appelée sur l'objet $book , 
si l'id du livre spécifié existe alors les données sont récupéréer avec la fonction 'getOneById'*/
if($book->checkIfExists() == 1) {
    $bookInfos = $book->getOneById(); 
} else { 
//Dans le cas contraire on est renvoyé sur la page 'users'
    header('Location: /users');
    exit;
}
//Appelle de la méthode 'getScanByIdBooks' avec l'objet $scan 
$scanList = $scan->getScanByIdBooks(); 

//var_dump($scanList);

require_once '../views/parts/header.php';
require_once '../views/parts/nav2.php';
require_once '../views/getBooks.php';
require_once '../views/scanList.php';
//require_once '../views/parts/footer.php';

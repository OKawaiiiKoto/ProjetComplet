<?php 
session_start();

require_once '../models/scansModel.php';
require_once '../models/booksModel.php';
require_once '../errors.php';

$book = new books; 
$scan = new scans;

$book->id = $_GET['id'];
$scan->id_books = $_GET['id'];

if($book->checkIfExists() == 1) {
    $bookInfos = $book->getOneById(); 
} else { 
    header('Location: /users');
    exit;
}

$scanList = $scan->getScanByIdBooks(); 
//var_dump($scanList);

require_once '../views/parts/header.php';
require_once '../views/parts/nav2.php';
require_once '../views/getBooks.php';
require_once '../views/scanList.php';
require_once '../views/parts/footer.php';

<?php 
session_start();

require_once '../models/booksModel.php';
require_once '../errors.php';

$book = new books; 
$book->id = $_GET['id'];

if($book->checkIfExists() == 1) {
    $bookInfos = $book->getOneById(); 
} else { 
    header('Location: /users');
    exit;
}

//var_dump($_GET);
require_once '../views/parts/header.php';
require_once '../views/parts/nav2.php';
require_once '../views/getBooks.php';
require_once '../views/parts/footer.php';

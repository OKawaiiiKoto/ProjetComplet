<?php 
session_start();
if (!isset($_SESSION['user']['id']) || $_SESSION['user']['id_usersroles'] != 2) {
    header('Location:/accueil');
    exit;
}
require_once '../models/booksModel.php';

$book = new books;
$booksList = $book->getList();

//var_dump($_SESSION);

require_once '../views/parts/header.php';
require_once '../views/parts/nav2.php';
require_once '../views/getBooksList.php';
require_once '../views/parts/footer.php';
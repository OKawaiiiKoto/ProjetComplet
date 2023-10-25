<?php 
session_start();
require_once '../models/booksModel.php';

$book = new books;
$booksList = $book->getList();

//var_dump($_SESSION);

require_once '../views/parts/header.php';
require_once '../views/parts/nav2.php';
require_once '../main.php';
require_once '../views/parts/footer.php';
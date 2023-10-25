<?php 
session_start();

require_once '../models/booksModel.php';

$book = new books;
$booksList = $book->getList();


require_once '../views/parts/header.php';
require_once '../views/parts/nav.php';
require_once '../menu.php';
require_once '../views/parts/footer3.php';
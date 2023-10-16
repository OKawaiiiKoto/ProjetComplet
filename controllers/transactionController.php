<?php 
session_start();

require_once '../models/transaction.php';
require_once '../models/scansModel.php';
require_once '../models/imagesModel.php';
require_once '../errors.php';

var_dump($_GET);

$formErrors = [];


$scan = new scans();
$images = new images();

if (count($formErrors) == 0) {
    try {
        $t = new transaction;
        $t->beginTransaction();
        $scan->chapter = 1;
        $scan->id_books = $_GET['id'];
        $scan->id_users = $_SESSION['user']['id'];
        $scan->add();
        $images->id_scans = $t->lastInsertId();
        $images->images = 'test';
        $images->add();
        $t->commit();
        }
        catch (PDOException $e){
            $t->rollBack();
            die($e->getMessage());
        }
}
var_dump($_POST);
require_once '../views/parts/header2.php';
require_once '../views/addImages.php';
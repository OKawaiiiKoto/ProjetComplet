<?php 
session_start();

require_once '../models/transaction.php';
require_once '../models/scansModel.php';
require_once '../models/imagesModel.php';
require_once '../errors.php';

$formErrors = [];


$scan = new scans();
$images = new images();

if (count($formErrors) == 0) {
    try {
        $t = new transaction;
        $t->beginTransaction();
        $scan->add();
        $scan->chapter = 125;
        $t->lastInsertId();
        $images->add();
        //$images->id_scans;
        $t->commit();
        }
        catch (PDOException $e){
            $t->rollBack();
            die($e->getMessage());
        }
}
var_dump($_POST);
require_once '../views/parts/header2.php';
//require_once '../views/addScans.php';
require_once '../views/addImages.php';
//require_once '../views/parts/footer.php';
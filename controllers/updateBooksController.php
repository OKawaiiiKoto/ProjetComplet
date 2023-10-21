<?php 
session_start();
//var_dump($_GET);
if (!isset($_SESSION['user']['id']) || $_SESSION['user']['id_usersroles'] != 2) {
    header('Location:/accueil');
    exit;
}
require_once '../models/booksModel.php';
require_once '../errors.php';

$formErrors = [];

$book = new books;
$book->id = $_GET['id'];

if (isset($_POST['update'])) {
    if (!empty($_POST['name'])) {
        $book->name = strip_tags($_POST['name']);
    } else {
        $formErrors['name'] = ERROR_NAME_TITLE_EMPTY;
    }

    if (!empty($_POST['year'])) {
        $book->year= strip_tags($_POST['year']);
    } else {
        $formErrors['year'] = ERROR_YEAR_CONTENT_EMPTY;
    }

    if (!empty($_POST['summary'])) {
        $book->summary = strip_tags($_POST['summary']);
    } else {
        $formErrors['summary'] = ERROR_POSTS_CONTENT_EMPTY;
    }


    if(count($formErrors) == 0){
        if($book->update()){
            $success = "Bien reçu repos soldat";
        }
    }
}

if(isset($_POST['updateImage'])){
    if ($_FILES['image']['error'] != 4) {
        if ($_FILES['image']['size'] < 1000000) {
            if ($_FILES['image']['error'] == 0) {
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                $authorizedExtension = [
                    'jpg' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif'
                ];

                if (array_key_exists($extension, $authorizedExtension) && mime_content_type($_FILES['image']['tmp_name']) == $authorizedExtension[$extension]) {
                    $path =  uniqid() . '_' . date('d-m-Y') . '.' . $extension;
                } else {
                    $formErrors['image'] = ERROR_POSTS_IMAGE_INVALID;
                }
            } else {
                $formErrors['image'] = ERROR_POSTS_IMAGE_UPLOAD;
            }
        } else {
            $formErrors['image'] = ERROR_POSTS_IMAGE_SIZE;
        }
    } else {
        $formErrors['image'] = ERROR_POSTS_IMAGE_EMPTY;
    }

    if(count($formErrors) == 0){
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/' . $path)) {
            var_dump($path);
            $book->image = $path;
            
            if(!$book->updateImage()){
                unlink('../assets/img/' . $path);
                $formErrors['image'] = ERROR_POSTS_IMAGE_UPLOAD;
            } 
        } else {
            $success = SUCCESS_POSTS_ADD;
        }
    }
}

if (isset($_POST['deleteBooks'])) {
    if($book->deleteBooks()){
        
        header('Location: /liste-livres');
        exit;
    }
  }
if (!empty($_GET['id'])) {
    if ($book->checkIfExists() == 0) {
        header('Location: /liste-livres');
        exit;
    }
}
$bookInfos = $book->getOneById();

//var_dump($bookInfos);

require_once '../views/parts/header.php';
require_once '../views/updateBooks.php';
require_once '../views/parts/footer2.php';
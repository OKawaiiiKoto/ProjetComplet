<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location:/connexion');
    exit;
}
require_once '../models/booksModel.php';
require_once '../errors.php';


$formErrors = [];

if (count($_POST) > 0) {
   
    $book = new books();

    if (!empty($_POST['name'])) {
        $book->name = strip_tags($_POST['name']);
       /* try {
            if ($user->checkBooksAvaibility() == 1) {
                $formErrors['name'] = 'le nom est deja utilise.';
            }*/
    } else {
        $formErrors['name'] = ERROR_NAME_TITLE_EMPTY;
    }

    if (!empty($_POST['year'])) {
        $book->year = strip_tags($_POST['year']);
    } else {
        $formErrors['year'] = ERROR_YEAR_CONTENT_EMPTY;
    }
   
   if (!empty($_POST['summary'])) { 
        $book->summary = strip_tags($_POST['summary']);
    } else {
        $formErrors['summary'] = ERROR_POSTS_CONTENT_EMPTY; 
    }
   
      
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
                   
                    $path = uniqid() . '_' . date('d-m-Y') . '.' . $extension;
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
    
    if (count($formErrors) == 0) {
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../assets' . $path)) {
            $book->image = $path;
            
            if($book->add()){
                $success = SUCCESS_POSTS_ADD;
            } else {
                $formErrors['general'] = ERROR_POSTS_GENERAL;
              
                unlink('../assets' . $path);
            }
        } else {
            $formErrors['image'] = ERROR_POSTS_IMAGE_UPLOAD;
        }        
    }
}
//var_dump($_POST);

require_once '../views/parts/header.php';
require_once '../views/addBooks.php';
require_once '../views/parts/footer.php';
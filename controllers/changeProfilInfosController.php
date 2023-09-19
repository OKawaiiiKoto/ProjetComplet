<?php 
session_start();
require_once '../usersModel.php';
$user = new users;

if (count($_POST) > 0 ) {

    if (!empty($_POST['username'])) {
        $user->username = $_POST['username'];
    }

    if(!empty($_POST['passwordConfirm'])) {
        if ($_POST['password'] === $_POST['passwordConfirm']) {
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    }


    $user->id =$_SESSION['user']['id'];
    $_SESSION['user']['username'] = $_POST['username'];
}

$user->changeInfos();


require_once '../views/parts/header.php';
require_once '../views/changeInfos.php';
require_once '../views/parts/footer.php';
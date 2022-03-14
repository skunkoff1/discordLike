<?php
$message = '';
$error = '';
$userName;
$userPassword;
$userPassword2;
$userMail;

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $userName = htmlspecialchars($_POST['name']);
    $userMail = htmlspecialchars($_POST['email']);
    $userPassword = htmlspecialchars($_POST['password']);
    $userPassword2 = htmlspecialchars($_POST['password2']);

    if(strlen($userName)<1) {
        header('location: ../index.php?name='.$userName.'&email='.$userMail.'&error=true&messageName=true');
        exit();
    }

    if(strlen($userMail)<1) {
        header('location: ../index.php?name='.$userName.'&email='.$userMail.'&error=true&messageEmail=true');
        exit();
    }

    if(!filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
        header('location: ../index.php?name='.$userName.'&email='.$userMail.'&error=true&messageInvalidEmail=true');
        exit();
    }

    header('location: ../index.php?name=&&messageSuccess=true');
}
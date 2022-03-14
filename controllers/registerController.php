<?php
$userName;
$userPassword;
$userPassword2;
$userMail;
$PASSWORD_REGEX = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

require('./connect.php');

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $userName = htmlspecialchars($_POST['name']);
    $userMail = htmlspecialchars($_POST['email']);
    $userPassword = htmlspecialchars($_POST['password']);
    $userPassword2 = htmlspecialchars($_POST['password2']);

    if(strlen($userName)<1) {
        header('location: ../index.php?error=true&messageName=true');
        exit();
    }

    if(strlen($userMail)<1) {
        header('location: ../index.php?error=true&messageEmail=true');
        exit();
    }

    //VERIFICATION SI L'EMAIL EXISTE DEJA DANS LA BASE DE DONNEES

    $req = $db->prepare('SELECT COUNT(*) AS x FROM users WHERE email = ?');
    $req->execute(array($userMail));

    while ($result = $req->fetch()) {

        if ($result['x'] != 0) {
            header('location: ../index.php?error=true&usedEmail=true');
            exit();
        }
    }

    //VERIFICATION SI LE PSEUDO EXISTE DEJA DANS LA BASE DE DONNEES

    $req = $db->prepare('SELECT COUNT(*) AS x FROM users WHERE username = ?');
    $req->execute(array($userName));

    while ($result = $req->fetch()) {

        if ($result['x'] != 0) {
            header('location: ../index.php?error=true&usedName=true');
            exit();
        }
    }

    if(!filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
        header('location: ../index.php?error=true&messageInvalidEmail=true');
        exit();
    }

    if(strlen($userPassword)<1) {
        header('location: ../index.php?error=true&messagePassword=true');
        exit();
    }
    
    if(preg_match($PASSWORD_REGEX, $userPassword)==0) {
        header('location: ../index.php?error=true&messageInvalidPassword=true');
        exit();
    }

    if(strlen($userPassword2)<1) {
        header('location: ../index.php?error=true&messagePassword2=true');
        exit();
    }

    if($userPassword != $userPassword2) {
        header('location: ../index.php?&error=true&messageNotEqualsPassword=true');
        exit();
    }  
        
    //SI OK, CHIFFRAGE DU MOT DE PASSE

    $salt = time() . sha1($userMail);
    $password = $salt . sha1($userPassword . "123") . "25";

    // SI OK, CREATION DU SECRET (correspond à l'id du cookie)

    $secret = sha1($userMail) . time();
    $secret = sha1($secret) . time();

    $req = $db->prepare('INSERT INTO users(username, email, secret, password, salt) VALUES (?,?,?,?,?)');
    $req->execute(array($userName, $userMail, $secret, $password, $salt));

    header('location: ../index.php?messageSuccess=true');    
}
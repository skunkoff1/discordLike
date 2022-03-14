<?php

require('./connect.php');
$serverName = '';
$message='';
$serverList = array();

if(isset($_POST['serverName'])) {
    $serverName = $_POST['serverName'];
    $message = '<p>nom envoyé : '.$serverName.'</p>';

    $request = $db->prepare('INSERT INTO server_list(server_name) VALUES (?)');
    $request->execute(array($serverName));
}

require('../views/home.php');
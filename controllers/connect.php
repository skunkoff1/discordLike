<?php

$host_name = 'localhost:3306';
$database = 'discord';
$user_name = 'root';
$password = 'Damabiah777!';
$dbh = null;

try {
  $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
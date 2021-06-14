<?php

try {
  $hostname = "localhost";
  $dbname = "crud_user";
  $username = "root";
  $pw = "";
  $pdo = new PDO("mysql:host={$hostname};dbname={$dbname}", $username, $pw);
} catch (PDOException $e) {
  echo "Connection error: {$e->getMessage()} \n";
}

?>
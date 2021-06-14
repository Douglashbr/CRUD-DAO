<?php
require_once "config.php";
require 'dao/UserDaoMysql.php';

$userDao = new UserDaoMySql($pdo);

$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($first_name && $last_name && $email) {

  if ($userDao->findByEmail($email) === null) {
    $newUser = new User();
    $newUser->setFirstName($first_name);
    $newUser->setLastName($last_name);
    $newUser->setEmail($email);

    $userDao->add($newUser);

    header("Location: index.php");
    exit;
  } else {
    header("Location: adicionar.php");
    exit;
  }
} else {
  header("Location: index.php");
  exit;
}
?>
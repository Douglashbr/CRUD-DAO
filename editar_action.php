<?php
require_once "config.php";
require 'dao/UserDaoMysql.php';

$userDao = new UserDaoMySql($pdo);

$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$id = filter_input(INPUT_POST, 'id');

if ($first_name && $last_name && $email && $id) {
  $user = new User();
  $user->setId($id);
  $user->setFirstName($first_name);
  $user->setLastName($last_name);
  $user->setEmail($email);

  $userDao->update($user);

  Header("Location: index.php");
  exit;

}else{
  header("Location: editar.php?id={$id}");
  exit;
}

?>
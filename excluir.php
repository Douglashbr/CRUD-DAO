<?php 
require_once "config.php";
require 'dao/UserDaoMysql.php';

$userDao = new UserDaoMySql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id) {
  $userDao->delete($id);
}

Header('Location: index.php');
exit;
?>
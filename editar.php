<?php 
require_once "config.php";
require 'dao/UserDaoMysql.php';

$userDao = new UserDaoMySql($pdo);

$user = null;
$id = filter_input(INPUT_GET, 'id');

if($id) {

  $user = $userDao->findById($id);
  
}

if ($user === null) {
  header("Location: index.php");
  exit;
}
?>

<h1>Editar usuário</h1>
<form method="POST" action="editar_action.php">
  <label>
    Nome </br>
    <input type="text" name="first_name" value="<?=$user->getFirstName();?>">
  </label>
  </br></br>
  <label>
    Sobrenome </br>
    <input type="text" name="last_name" value="<?=$user->getLastName();?>">
  </label>
  </br></br>
  <label>
    E-mail </br>
    <input type="email" name="email" value="<?=$user->getEmail();?>">
  </label>
  </br></br>
  <input type="hidden" name="id" value="<?=$user->getId();?>"/>
  <input type="submit" value="Salvar">
</form>
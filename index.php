<?php 
require_once "config.php";
require 'dao/UserDaoMysql.php';

$userDao = new UserDaoMySql($pdo);
$list = $userDao->findAll();
?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>SOBRENOME</th>
    <th>E-MAIL</th>
    <th>AÇÕES</th>
  </tr>
  <?php foreach ($list as $user): ?>
    <tr>
      <td><?=$user->getId();?></td>
      <td><?=$user->getFirstName();?></td>
      <td><?=$user->getLastName();?></td>
      <td><?=$user->getEmail();?></td>
      <td>
        <a href="editar.php?id=<?=$user->getId();?>">[ Editar ]</a>
        <a href="excluir.php?id=<?=$user->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
      </td>
    </tr>
  <?php endforeach ?>
</table>
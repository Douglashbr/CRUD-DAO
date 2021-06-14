<?php
require 'models/User.php';

class UserDaoMySql implements UserDAO {

  private $pdo;

  public function __construct (PDO $driver) {
    $this->pdo = $driver;
  }

  public function add (User $user):User {
    $sql = $this->pdo->prepare("INSERT INTO user (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");
    $sql->bindValue(':first_name', $user->getFirstName());
    $sql->bindValue(':last_name', $user->getLastName());
    $sql->bindValue(':email', $user->getEmail());

    $sql->execute();

    $user->setId( $this->pdo->lastInsertId() );
    
    return $user;
  }

  public function findAll ():array {
    $array = [];

    $sql = $this->pdo->query("SELECT * FROM user");

    if ($sql->rowCount() > 0) {
      $data = $sql->fetchAll();

      foreach ($data as $item) {
        $user = new User();
        $user->setId($item['id']);
        $user->setFirstName($item['first_name']);
        $user->setLastName($item['last_name']);
        $user->setEmail($item['email']);
        
        $array[] = $user;
      }
    }

    return $array;
  }

  public function findById (int $id):?User {
    $sql = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
    $sql->bindValue(':id', $id);

    $sql->execute();

    if ($sql->rowCount() > 0) {
      $data = $sql->fetch();

      $user = new User();
      $user->setId($data['id']);
      $user->setFirstName($data['first_name']);
      $user->setLastName($data['last_name']);
      $user->setEmail($data['email']);

      return $user;
    } else {
      return null;
    }
  }

  public function findByEmail (string $email):?User {
    $sql = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
    $sql->bindValue(':email', $email);

    $sql->execute();

    if ($sql->rowCount() > 0) {
      $data = $sql->fetch();

      $user = new User();
      $user->setId($data['id']);
      $user->setFirstName($data['first_name']);
      $user->setLastName($data['last_name']);
      $user->setEmail($data['email']);

      return $user;
    } else {
      return null;
    }
  }

  public function update (User $user) {
    $sql = $this->pdo->prepare("UPDATE user SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id");

    $sql->bindValue(":id", $user->getId());
    $sql->bindValue(":first_name", $user->getFirstName());
    $sql->bindValue(":last_name", $user->getLastName());
    $sql->bindValue(":email", $user->getEmail());

    $sql->execute();

    return true;
  }

  public function delete (int $id) {
    $sql = $this->pdo->prepare("DELETE FROM user WHERE id = :id");

    $sql->bindValue(":id", $id);

    $sql->execute();
  }
}
<?php
class User {
  private int $id;
  private string $first_name;
  private string $last_name;
  private string $email;

  public function getId ():int {
    return $this->id;
  }

  public function setId (int $id) {
    $this->id = trim($id);
  }

  public function getFirstName ():string {
    return $this->first_name;
  }

  public function setFirstName (string $first_name) {
    $this->first_name = ucwords(trim($first_name));
  }

  public function getLastName ():string {
    return $this->last_name;
  }

  public function setLastName (string $last_name) {
    $this->last_name = ucwords(trim($last_name));
  }

  public function getEmail ():string {
    return $this->email;
  }

  public function setEmail (string $email) {
    $this->email =strtolower(trim($email));
  }

}

interface UserDAO {
  public function add (User $User):User;
  public function findAll ():array;
  public function findById (int $id):?User;
  public function findByEmail (string $email):?User;
  public function update (User $User);
  public function delete (int $id);
}
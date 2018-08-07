<?php

class User {
  private $db;

  // Create a new database instance.
  public function __construct(){
    $this->db = new Database;
  }

  // Find user by email.
  public function findUserByEmail($email){
    // Query the database with a named variable.
    $this->db->query('SELECT * FROM users WHERE email = :email');

    // Bind a value to that variable, based on the input to this function.
    $this->db->bind(':email', $email);

    // Run a query for a single row.
    $row = $this->db->single();

    if($this->db->rowCount() > 0){
      return true;
    } else {
      return false;
    }

  }

  // Register user.
  public function register($data){
    // Prepare statement.
    $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');

    // Bind values to named parameters.
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);

    // Execute.
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
}

?>

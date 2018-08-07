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

  public function login($email, $password) {
    // Query for the user.
    $this->db->query('SELECT * FROM users WHERE email = :email');
    // Bind the value.
    $this->db->bind(':email', $email);
    // Grab the row where the user is.
    $row = $this->db->single();

    // All passwords inputted to the database should be hashed.
    $hashed_password = $row->password;

    if(password_verify($password, $hashed_password)){
      return $row;
    } else {
      return false;
    }
  }
}

?>

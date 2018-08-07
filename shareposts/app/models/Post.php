<?php

class Post {
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getPosts(){
    // Make a sql query.
    $this->db->query("SELECT * FROM posts");

    // Return query results.
    return $this->db->resultSet();
  }
}

?>

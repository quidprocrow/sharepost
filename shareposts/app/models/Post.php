<?php

class Post {
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getPosts(){
    $this->db->query('SELECT *, posts.id as postId,
                      users.id as userId,
                      posts.created_at as postCreated,
                      users.created_at as userCreated
                      FROM posts
                      INNER JOIN users
                      ON posts.user_id = users.id
                      ORDER BY posts.created_at DESC');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addPost($data){
    // Prepare statement.
    $this->db->query('INSERT INTO posts (title, body, user_id) VALUES(:title, :body, :user_id)');

    // Bind values to named parameters.
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);
    $this->db->bind(':user_id', $data['user_id']);

    // Execute.
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }

  }

}

?>

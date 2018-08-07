<?php

class Users {
  public function __construct(){

  }

  public function register(){
    // Check for post request.
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // If it is a post request, process form.
    } else {
      echo 'Load form!';
    }
  }

}

?>

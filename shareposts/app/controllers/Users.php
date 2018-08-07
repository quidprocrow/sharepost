<?php

class Users extends Controller {
  public function __construct(){

  }

  public function register(){
    // Check for post request.
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // If it is a post request, process form.
    } else {
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Load the view for registration.
      $this->view('users/register', $data);
    }
  }

}

?>

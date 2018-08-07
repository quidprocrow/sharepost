<?php

class Users extends Controller {
  public function __construct(){
    $this->userModel = $this->model('User');

  }

  public function register(){
    // Check for post request.
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // If it is a post request, process form.


      // Filter the form.
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Initialize data.
      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Validate email.
      if(empty($data['email'])){
        $data['email_err'] = 'Please enter an email.';
      } else {
        // Check the email.
        if($this->userModel->findUserByEmail($data['email'])){
          $data['email_err'] = 'Email is already taken.';
        }
      }

      // Validate name.
      if(empty($data['name'])){
        $data['name_err'] = 'Please enter your name.';
      }

      // Validate password.
      if(empty($data['password'])){
        $data['password_err'] = 'Please enter a password.';
      } elseif(strlen($data['password']) < 6){
        $data['password_err'] = 'Password must be at least 6 characters.';
      }

      // Validate confirm password.
      if(empty($data['confirm_password'])){
        $data['confirm_password_err'] = 'Please enter a password confirmation.';
      } elseif($data['confirm_password'] != $data['password']){
        $data['confirm_password_err'] = 'Passwords do not match.';
      }

      // Check that there are no errors.
      if(empty($data['email_err']) && empty($data['name_err'])
      && empty($data['password_err']) && empty($data['confirm_password_err'])){
        // Hash password.
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register user.
        if($this->userModel->register($data)){
          // If all goes well.
        } else {
          die('Something went wrong!');
        }

      } else {
        // Reload with errors displayed.
        $this->view('users/register', $data);
      }



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

  public function login(){
    // Check for post request.
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // If it is a post request, process form.


      // Filter the form.
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Initialize data.
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => ''
      ];

      // Validate email.
      if(empty($data['email'])){
        $data['email_err'] = 'Please enter an email.';
      }

      // Validate password.
      if(empty($data['password'])){
        $data['password_err'] = 'Please enter a password.';
      } elseif(strlen($data['password']) < 6){
        $data['password_err'] = 'Password must be at least 6 characters.';
      }

      // Check that there are no errors.
      if(empty($data['email_err']) && empty($data['password_err'])){
        die('SUCCESS!');
      } else {
        // Reload with errors displayed.
        $this->view('users/login', $data);
      }

    } else {
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load the view for registration.
      $this->view('users/login', $data);
    }
  }

}

?>

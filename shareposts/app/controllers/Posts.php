<?php

class Posts extends Controller {
  public function __construct(){
    if(!isLoggedIn()){
      redirect('users/login');
      flash('not_logged_in', 'You must be logged in to view posts.', 'alert alert-danger');
    }
  }

  public function index(){
    $data = [];

    $this->view('posts/index', $data);
  }
}

?>

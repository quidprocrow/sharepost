<?php

class Posts extends Controller {
  public function __construct(){
    if(!isLoggedIn()){
      redirect('users/login');
      flash('not_logged_in', 'You must be logged in to view posts.', 'alert alert-danger');
    }

    $this->postModel = $this->model('Post');
  }

  public function index(){

    $posts = $this->postModel->getPosts();
    $data = [
      'posts' => $posts
    ];

    $this->view('posts/index', $data);
  }
}

?>

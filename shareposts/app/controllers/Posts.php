<?php

class Posts extends Controller {
  public function __construct(){
    if(!isLoggedIn()){
      redirect('users/login');
      flash('not_logged_in', 'You must be logged in to view posts.', 'alert alert-danger');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }

  public function index(){

    $posts = $this->postModel->getPosts();
    $data = [
      'posts' => $posts
    ];

    $this->view('posts/index', $data);
  }

  public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize.
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate title.
      if(empty($data['title'])){
        $data['title_err'] = 'Please enter a title.';
      }

      // Validate body.
      if(empty($data['body'])){
        $data['body_err'] = 'Please enter a post.';
      }

      // Make sure there are no errors.
      if(empty($data['body_err']) && empty($data['title_err'])){
        // Validate whether this goes through.
        if($this->postModel->addPost($data)){
          flash('post_message', 'Post added!', 'alert alert-success col-md-12');
          redirect('posts/index');
        } else {
          die('Something went wrong.');
        }

      } else {
        // Load view with errors displayed.
        $this->view('posts/add', $data);
      }

    } else {
      // if the form is just navigated to.
      $data = [
        'title' => '',
        'body' => '',
        'title_err' => '',
        'body_err' => ''
      ];

      $this->view('posts/add', $data);
    }
  }

  public function edit($id){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize.
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'id' => $id,
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate title.
      if(empty($data['title'])){
        $data['title_err'] = 'Please enter a title.';
      }

      // Validate body.
      if(empty($data['body'])){
        $data['body_err'] = 'Please enter a post.';
      }


      // Make sure there are no errors.
      if(empty($data['body_err']) && empty($data['title_err'])){
        // Validate whether this goes through.
        if($this->postModel->updatePost($data)){
          flash('post_message', 'Post edited!', 'alert alert-success col-md-12');
          redirect('posts/index');
        } else {
          die('Something went wrong.');
        }

      } else {
        // Load view with errors displayed.
        $this->view('posts/edit', $data);
      }

    } else {
      // Get existing post by model.
      $post = $this->postModel->getPostById($id);
      // Check to see that the user on the post is the same person logged in.
      if($post->user_id != $_SESSION['user_id']){
        // If not, bye!
          redirect('posts/index');
      }

      $data = [
        'id' => $id,
        'title' => $post->title,
        'body' => $post->body,
      ];

      $this->view('posts/edit', $data);
    }
  }

  public function show($id){
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);

    $data = [
      'post' => $post,
      'user' => $user
    ];

    $this->view('posts/show', $data);
  }

  public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      // Get existing post by model.
      $post = $this->postModel->getPostById($id);
      // Check to see that the user on the post is the same person logged in.
      if($post->user_id != $_SESSION['user_id']){
        // If not, bye!
          redirect('posts/index');
      }

      // Delete the post.
      if($this->postModel->deletePost($id)){
        // Display success.
        flash('post_message', 'Post removed!', 'alert alert-success col-md-12');
        redirect('posts/index');
      } else{
        // Note failure. 
        die('Something went horribly wrong.');
      }

    } else {
      redirect('posts');
    }
  }

}

?>

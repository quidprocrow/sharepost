<?php

  class Pages extends Controller {
    public function __construct(){

    }

    public function index(){
      $data = [
        'title' => 'Welcome',
        'description' => 'A simple social network built on the Traversy MVC PHP framework.'
      ];
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'An application to share posts with other users.'
      ];
      $this->view('pages/about', $data);
    }
  }


?>

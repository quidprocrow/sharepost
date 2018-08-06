<?php

  class Pages extends Controller {
    public function __construct(){
      echo 'Pages loaded';
    }

    public function index(){
      echo 'You found index!';
    }

    public function about($id){
      echo 'This is about, with id' . $id;
    }
  }


?>

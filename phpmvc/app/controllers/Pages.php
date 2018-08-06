<?php

  class Pages {
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

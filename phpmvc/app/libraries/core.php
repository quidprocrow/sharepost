<?php
  /*
    App Core Class
    Creates URL and loads core controller
    URL Format - /controller/method/params
  */

  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      $this->getUrl();

    }

    public function getUrl(){
      echo $_GET['url'];

    }
  }

?>

Core!

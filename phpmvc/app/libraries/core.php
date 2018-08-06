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
      // Confirm getUrl working by printing the array.
      // print_r($this->getUrl());

      $url = $this->getUrl();

      // Look in controllers for the first value.
      // Checks the controller folder for a php file corresponding to
      // the first parameter.
      // Using ucwords to ensure the file is uppercase, as is standard.
      if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){

        // If there is such a controller, make it the current one.
        $this->currentController =  ucwords($url[0]);
        // After it becomes the new current controller, remove it from the url array.
        unset($url[0]);
      }

      // Require the controller.
      // This will be the pages controller or the controller specified through
      // url parameters.
      require_once '../app/controllers/' . $this->currentController . '.php';

      // Instantiate controller.
      $this->currentController = new $this->currentController;
    }

    public function getUrl(){
      // First, check to see that there is a url parameter.
      if(isset($_GET['url'])){
        // Strip out the trailing slash.
        $url = rtrim($_GET['url'], '/');
        // Filter out any naughty bits.
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // Create an array based on the remaining slashes.
        $url = explode('/', $url);
        // Return the url.
        return $url;
      }
    }
  }

?>

Core!

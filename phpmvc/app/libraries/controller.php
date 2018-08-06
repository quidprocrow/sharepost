<?php

/* Base Controller
Loads models and views
*/

class Controller {
  // Load model
  public function model($model){

    // Require model file.
    require_once '../app/models/' . $model . '.php';

    // Instantiate the model.
    return new $model();
  }

  public function view($view, $data = []){
    // Check to see that such a vew file exists.
    if(file_exists('../app/views/' . $view . '.php')){
      // If it does exist, require it.
      require_once '../app/views/' . $view . '.php';
    } else {
      // If the file does not exist, show an error.
      die('Page does not exist!');
    }
  }
}

?>

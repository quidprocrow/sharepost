<?php

// Load configuration file
require_once 'config/config.php';

// // Load Libraries
// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

// Autoload Core Libraries.
// This function will work, as long as file's name is the same
// as the class it contains.
// This is useful if the list of libraries gets very long.
spl_autoload_register(function($className){
  require_once 'libraries/' . $className . '.php';

});


?>

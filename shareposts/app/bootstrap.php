<?php

// Load configuration file
require_once 'config/config.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

// // Load Libraries
// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

// Autoload Core Libraries.
// This function will work, as long as file's name is the same
// as the class it contains.
// Hence why the file names are capitalized to match the uppercase
// syntax expected of classes.
// This is useful if the list of libraries gets very long.
spl_autoload_register(function($className){
  require_once 'libraries/' . $className . '.php';

});


?>

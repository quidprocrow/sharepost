<?php
  // Create a connection

  $conn = mysqli_connect('localhost', 'root', '', 'phpblog');

  if (mysqli_connect_errno()) {
    echo 'Failed to connect to MySQL'. mysqli_connect_errno();
  }

?>

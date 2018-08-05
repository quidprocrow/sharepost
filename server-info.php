<?php
  # $_SERVER SUPERGLOBAL

  // Create server array.

  $server = [
    'Host Server Name'  => $_SERVER['SERVER_NAME'],
    'Host Header' => $_SERVER['HTTP_HOST'],
    'Server Software' => $_SERVER['SERVER_SOFTWARE'],
    'Document Root' => $_SERVER['DOCUMENT_ROOT'],
    'Script Name' => $_SERVER['SCRIPT_NAME'],
    // 'Current Page' => $_SERVER['CURRENT_PAGE'],
    'Absolute Path' => $_SERVER['SCRIPT_FILENAME']
  ];

// print_r($server);

  // Create a client array.

  $client = [
    'Client System Info' => $_SERVER['HTTP_USER_AGENT'],
    'Client IP' => $_SERVER['REMOTE_ADDR'],
    'Remote Port' => $_SERVER['REMOTE_PORT']
  ];

  echo '<BR>';

  // print_r($client);

?>

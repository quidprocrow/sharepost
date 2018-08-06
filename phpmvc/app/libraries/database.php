<?php

/*
  PDO Database class
  Connect to database
  Create prepared statements
  Bind values
  Return rows and results
*/

class Database {
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;

  private $dbh;
  private $stmt;
  private $error;

  public function __construct(){
    // Set DSN
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // Create a PDO instance.
    // Try to do it; if it throws an error, catch it.
    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    } catch(PDOException $e){
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }

  public function query($sql){
    // Prepares a sql statement.
    $this->stmt = $this->dbh->prepare($sql);
  }

  // Binds values to that sql statement.
  public function bind($param, $value, $type = null){
    // Test to see the value type.
    // If nothing is set as the type ...
    if(is_null($type)){
      // Check to see what its type is using php functions.
      // Assign it accordingly.
      switch(true){
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }
    // Bind the values.
    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute(){
    return $this->stmt->execute();
  }

  // Get result set as array of objects.
  public function resultSet(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Get a single result as an object.
  public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function rowCount(){
    // Row count is a PDO method. 
    return $this->stmt->rowCount();
  }

}

?>

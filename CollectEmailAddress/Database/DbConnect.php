<?php

namespace Liana\Database;

use PDO;
use PDOException;

/*
* Mysql database class - only one connection alowed
*/
class DbConnect {
  private $connection;
  private static $_instance;

  private $dbhost = "localhost"; // Ip Address of database if external connection.
  private $dbuser = "root"; // Username for DB
  private $dbpass = ""; // Password for DB
  private $dbname = "liana_demo"; // DB Name

  /*
  Get an instance of the Database
  @return Instance
  */	
  public static function getInstance(){
    if(!self::$_instance) {
          self::$_instance = new self();
        }
      return self::$_instance;
    }

  // Constructor
  private function __construct() {
    try {
      $this->connection = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname, $this->dbuser, $this->dbpass);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
      die("Failed to connect to DB: ". $e->getMessage());
    }
  }

  // Magic method clone is empty to prevent duplication of connection
  private function __clone(){}
  
  // Get the connection	
  public function getConnection(){
    return $this->connection;
  }
}

?>

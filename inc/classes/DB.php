<?php

// if there's no constant defined called __CONFIG__,
// don't load this file
if (!defined("__CONFIG__")) {
    exit("You don't have a config file");
}

  class DB {
    protected static $con;
    
    private function __construct() {
      try {
        self::$con = new PDO( 'mysql:charset=utf8mb4;host=94.130.23.82;port=3306;dbname=dressmep_login_system', 'dressmep_admin', 'mynameissonny' );
        self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );
      } catch (PDOException $e) {
        echo "Couldn't connect to database";
        exit;
      }
    }
    
    public static function getConnection() {
      if (!self::$con) {
        new DB();
      }
      return self::$con;
    }
  }
?>
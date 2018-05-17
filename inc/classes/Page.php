<?php

// if there's no constant defined called __CONFIG__,
// don't load this file
if (!defined("__CONFIG__")) {
    exit("You don't have a config file");
}

class Page {

  static function ForceLogin() {
    if(isset($_SESSION['user_id'])) {
        // user is allowed here
      } else {
        // user isn't allowed here
        header("Location: /nt/lrp/login.php");
        exit;
      }
  }

  static function ForceDashboard() {
    if(isset($_SESSION['user_id'])) {
        // user is not allowed here
        header("Location: /nt/lrp/dashboard.php");
        exit;
      } else {
        // user is allowed here
      }
  }
}

?>
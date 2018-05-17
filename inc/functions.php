<?php

function ForceLogin() {
  if(isset($_SESSION['user_id'])) {
      // user is allowed here
    } else {
      // user isn't allowed here
      header("Location: /nt/lrp/login.php");
      exit;
    }
}

function ForceDashboard() {
  if(isset($_SESSION['user_id'])) {
      // user is not allowed here
      header("Location: /nt/lrp/dashboard.php");
      exit;
    } else {
      // user is allowed here
    }
}

?>
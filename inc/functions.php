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

?>
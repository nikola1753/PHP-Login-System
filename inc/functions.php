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

function FindUser($con, $email, $return_assoc = false) {
  // make sure user doesn't exist
  $email = (string) Filter::String($email);
  
  $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
  $findUser->bindParam(':email', $email, PDO::PARAM_STR);
  $findUser->execute();
  
  if($return_assoc) {
    return $findUser->fetch(PDO::FETCH_ASSOC);
  }
  
  // $user_found = (boolean) $findUser->rowCount();
  // return $user_found;
  
  if($findUser->rowCount() == 1) {
    return true;
  }
  return false;
}

?>
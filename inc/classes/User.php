<?php

// if there's no constant defined called __CONFIG__,
// don't load this file
if (!defined("__CONFIG__")) {
    exit("You don't have a config file");
}

  class User {
  
    public static function Find($email, $return_assoc = false) {
    // make sure user doesn't exist
    
    $con = DB::getConnection();
      
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

}

?>
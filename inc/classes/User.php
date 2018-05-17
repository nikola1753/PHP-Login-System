<?php

// if there's no constant defined called __CONFIG__,
// don't load this file
if (!defined("__CONFIG__")) {
    exit("You don't have a config file");
}

  class User {
    
    private $con;
    
    public $user_id;
    public $email;
    public $reg_time;
    
    public function __construct($user_id) {
      $this->con = DB::getConnection();
      
      $user_id = Filter::Int( $user_id );
      
      $user = $this->con->prepare("SELECT user_id, email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
      $user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $user->execute();
      
      if($user->rowCount() == 1) {
        $user = $user->fetch(PDO::FETCH_OBJ);
        
        $this->email    = (string)  $user->email;
        $this->user_id  = (int)     $user->user_id;
        $this->reg_time = (string)  $user->reg_time;
      } else {
        // no user, redirect to logout
        header("Location: /nt/lrp/logout.php");
        exit;
      }
    }
    
    /*
    public function setEmail($new_email) {
      $User = new User(1);
      $User->setEmail("new@email.com");
      
      echo $this->email;    // current email
      echo $this->user_id;  // existing id
      
      $this->con->prepare("sql");
    }
    */
    
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
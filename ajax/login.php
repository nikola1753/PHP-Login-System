<?php
// allow the config
define("__CONFIG__", true);
// require the config
require_once "../inc/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // always return json format
  header('Content-Type: application/json');
  $return = [];
  
  $email = Filter::String( $_POST['email']);
  // $email = strtolower($email);
  $password = $_POST['password'];
  
  // make sure user doesn't exist
  $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
  $findUser->bindParam(':email', $email, PDO::PARAM_STR);
  $findUser->execute();
  
  if($findUser->rowCount() == 1) {
    // user exists, try and sign them in

    $user = $findUser->fetch(PDO::FETCH_ASSOC);
    $user_id = (int)$user['user_id'];
    $hash = $user['password'];
    
    if(password_verify($password, $hash)) {
      // user is signed in
      $return['redirect'] = "/nt/lrp/dashboard.php";
      
      $_SESSION['user_id'] = $user_id;
    } else {
      // invalid user email/password combo
      $return['error'] = "Invalid user email/password combination";
    }
    
    $return['error'] = 'You already have an account';
    $return['is_logged_in'] = false;
  } else {
    // they need to create a new acc
    $return['error'] = "You don't have an account, <a href='/nt/lrp/register.php'>create one now?</a>";
  }
  
  // make sure user can be added and is added
  
  // return proper info to JavaScript to redirect us
  
  echo json_encode($return, JSON_PRETTY_PRINT);
  exit;
} else {
  // kill script, redirect
  exit('Invalid URL');
}
?>
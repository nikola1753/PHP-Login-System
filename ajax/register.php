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
  
  // make sure user doesn't exist
  $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
  $findUser->bindParam(':email', $email, PDO::PARAM_STR);
  $findUser->execute();
  
  if($findUser->rowCount() == 1) {
    // user exists
    // see if they're able to log in
    $return['error'] = 'You already have an account';
    $return['is_logged_in'] = false;
  } else {
    // user doesn't exist, add user
    
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
    $addUser->bindParam(':email', $email, PDO::PARAM_STR);
    $addUser->bindParam(':password', $password, PDO::PARAM_STR);
    $addUser->execute();
    
    $user_id = $con->lastInsertId();
    
    $_SESSION['user_id'] = (int) $user_id;
    $return['redirect'] = '/nt/lrp/dashboard.php?message=welcome';
    $return['is_logged_in'] = true;
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
<?php
// allow the config
define("__CONFIG__", true);
// require the config
require_once "../inc/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // always return json format
  header('Content-Type: application/json');
  $return = [];
  
  // make sure user doesn't exist
  
  // make sure user can be added and is added
  
  // return proper info to JavaScript to redirect us
  
  $return['redirect'] = '/nt/lrp/index.php?this-was-a-redirect';
  
  echo json_encode($return, JSON_PRETTY_PRINT);
  exit;
} else {
  // kill script, redirect
  exit('test');
}
?>
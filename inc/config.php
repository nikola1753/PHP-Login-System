<?php 

// if there's no constant defined called __CONFIG__,
// don't load this file
if (!defined("__CONFIG__")) {
    exit("You don't have a config file");
}

// sessions are on
if(!isset($_SESSION)) {
  session_start();
}

// config below

// include db.php
include_once 'classes/DB.php';
include_once 'classes/Filter.php';
include_once 'classes/User.php';
include_once 'classes/Page.php';

$con = DB::getConnection();

?>
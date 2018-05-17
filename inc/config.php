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
include_once 'classes/db.php';
include_once 'classes/filter.php';

$con = DB::getConnection();

?>
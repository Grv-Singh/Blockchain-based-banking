<?php
include_once 'functions.php';   // As functions.php is not included

define("HOST", "localhost");     // The host you want to connect to.
define("USER", "sec_user");    // The database username. 
define("PASSWORD", "eKcGZr59zAa2BEWU");    // The database password. 
define("DATABASE", "secure_login_db");    // The database name.
 
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");
 
define("SECURE", TRUE);    // FOR DEVELOPMENT ONLY!!!!

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
?>
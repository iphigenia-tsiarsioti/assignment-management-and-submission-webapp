<?php
 session_start();
$errors = array(); 
$_SESSION['success'] = "";
$username="";
// Create connection
$db = new mysqli("localhost", "root" , "", "ptyxiaki");

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
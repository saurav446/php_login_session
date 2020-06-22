<?php
session_start();

session_destroy();
$_SESSION = array();


setcookie('success', $keep,time() - 60 );

 
header('location: login.php');
?>


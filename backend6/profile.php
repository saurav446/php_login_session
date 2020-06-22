<?php

require_once('function.php');

session_start();
if(!user_logged_in()){
    header('location: login.php');
    die();
}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<body>


<h2>welcome to admin panel  </h2>

<button > <a href="logout.php">logout</a></button>
    
</body>
</html>
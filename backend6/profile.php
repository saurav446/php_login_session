<?

require_once('function.php');
require_once('config.php');

session_start();

if($_SESSION['Active'] == false){ 
    header("location: login.php");
	  exit;
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
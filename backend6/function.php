<?php
require_once('config.php');


function email_exists(){

    global $connection; 
    global $email;

    $query = mysqli_query($connection,"SELECT * FROM signup WHERE email = '$email'");

     if(mysqli_num_rows($query) == 1){
      return true;
     }
}

       function uname_ex(){

        global $connection; 
        global $uname;

        $sql = "SELECT * FROM signup WHERE uname ='$uname' LIMIT 1";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) == 1){
            return true;
        }
       }
       

function user_logged_in(){

	if(isset($_SESSION['success']) || isset($_COOKIE['success'])){

		return true;
	}
    else{
        return false;
    }
}
   


?>









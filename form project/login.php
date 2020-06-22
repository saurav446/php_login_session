<?php 

	session_start();

	require_once('function.php');


	if(user_logged_in()){
		header('location: profile.php');
		die();
	}

if(isset($_POST['login'])){
      $email = $_POST['email'];
      $password = $_POST['password'];

	  $keep = isset($_POST['keep']);
      if(email_exists()){
       
          $password_query = mysqli_query($connection,"SELECT * FROM signup WHERE email = '$email'");
         
          $row = mysqli_fetch_assoc($password_query);
          if(md5($password) == $row['password']){
		  $_SESSION['success'] = "logged in";
		  setcookie('success', $keep, time() + 60 );
            header('location: profile.php');
          }
          else{
            $success = "Password dose not match";
          }
      }
      else{
        $success = "Email dose not exist in data base";
      }

  }




?>

 <!DOCTYPE html>
<html>
<head>
<title>Creative SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="style.css">
</head>
<body>
	 
	 <div class="main-w3layouts wrapper">
		<h1>Login Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="POST">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<div class="loing" style="color:#FFFFFF; margin-top:15px; font-size:15px;"><?php if(isset($success)){ echo $success; }  ?></div>
					<div class="wthree-text">
					<label for="keep" name="login">
					<input type="checkbox" id="keep" name="keep" >
				   <span>Keep me logged in</span>
				</label> 
						<div class="clear"> </div>
					</div>
					<input type="submit" value="LOGIN" name="login">
					<div class="loing" style="color:#FFFFFF; text-align:center; font-size:20px;">OR</div>
					<a class="login" href='register.php'> SIGNUP</a>
				</form>
				<p>Don't have an Account Places SIGNUP Now!</a></p>
			</div>
        </div> 
        




		<div class="colorlibcopy-agile">
			<p>© 2020 saurav Signup Form. All rights reserved </p>
		</div>
		
</body>
</html> 
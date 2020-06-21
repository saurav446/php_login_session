<?php

require_once('function.php');
   session_start();
	  if(user_logged_in()){
		header('location: profile.php');
		die();
	}

	  if(isset($_POST['login'])){
		  $email = $_POST['email'];
		  $password = $_POST['password'];
		  	
      if(email_exists()){
		$password_query = mysqli_query($connection, "SELECT * FROM signup WHERE email = '$email'");

		$row = mysqli_fetch_assoc($password_query);
		
		if($password == $row['password']){
			$_SESSION['password'] = $password;
                $_SESSION['Active'] = true;
                header("location: profile.php");
                exit;
            
		}
		else{
			$success = "Password Dose Not Matach";
		}

	  }
		else{
			echo "email dose not exists database";
		}


	  }
	  


?>
<!DOCTYPE html>
<html>
<head>
<title>Creative SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Login Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="POST">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<div class="loing" style="color:#FFFFFF; margin-top:15px; font-size:15px;"><?php if(isset($success)){ echo $success; }  ?></div>
					<div class="wthree-text">
						<label class="anim">
							<!-- <input type="checkbox" class="checkbox" required="">
							<span>keep logged in</span> -->
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="LOGIN" name="login">
				</form>
				<p>Don't have an Account? <a href="register.php"> SIGNUP Now!</a></p>
			</div>
        </div>
        




		<div class="colorlibcopy-agile">
			<p>© 2018 saurav Signup Form. All rights reserved </p>
		</div>
		
</body>
</html>
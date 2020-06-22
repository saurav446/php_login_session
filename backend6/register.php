<?php


session_start();

	require_once('function.php');

	if(user_logged_in()){
		header('location: profile.php');
		die();
	}

      if(isset($_POST['register'])){
		  $uname = $_POST['uname'];
		  $email = $_POST['email'];
		  $cpassword = $_POST['cpassword'];
		  $password = md5($_POST['password']);
		   
			$error = array();
		

			if(uname_ex()){
				$error['uname'] = "Usename already exists";
			}
			if (strlen($password) <= 8 ) {
				$error['password'] = 'Password must be 8 character';
			}
			if (isset($_POST['password']) && $_POST['password'] !== $_POST['cpassword']) {
				$error['cpassword'] = 'The two passwords do not match';
			}
			if (email_exists()){
				$error['email'] = "This email already have an account! Places <a href='login.php'>Login Now!</a>";
				 }


			 
			if(count($error) == 0 ){
				$query = mysqli_query($connection,"INSERT INTO signup  (uname,email,password,cpassword) VALUES('$uname','$email','$password','$cpassword')");
				  $success =  "You have been Registered! Places <a href='login.php'>Login Now!</a>";
			}

			
	  }

?>

<!DOCTYPE html>
<html>
<head>
<title>Creative  SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="style.css">
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Creative SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="POST">
					<input class="text" type="text" name="uname" placeholder="Username" required="">
					<div class="loing" style="color:#FFFFFF; font-size:15px;"> <?php if(isset($error['uname'])){ echo $error['uname']; } ?></div>

					<input class="text email" type="email" name="email" placeholder="Email" required="">
					
					<input class="text" type="password" name="password" placeholder="Password" required="">

					<div class="loing" style="color:#FFFFFF; font-size:15px;"> <?php if(isset($error['password'])){ echo $error['password']; } ?></div>
					<div class="loing" style="color:#FFFFFF; font-size:15px;"> <?php if(isset($error['cpassword'])){ echo $error['cpassword']; } ?></div>
					<input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<!-- <input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span> -->
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name="register" value="SIGNUP">
					
					<div class="loing" style="color:#FFFFFF; text-align:center; font-size:20px;"> <?php if(isset($error['email'])){ echo $error['email']; } ?></div>
				</form>

				
                     <div class="loing" style="color:#FFFFFF; text-align:center; font-size:20px;"><?php if(isset($success)){ echo $success; }  ?></div>
					 <a href='login.php'>Login Now!</a>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 saurav Signup Form. All rights reserved </p>
        </div>
        




</body>
</html>

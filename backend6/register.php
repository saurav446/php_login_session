<?php


require_once('function.php');
session_start();
	
	if(user_logged_in()){
		header('location: profile.php');
		die();
	}

      if(isset($_POST['register'])){
		  $uname = $_POST['uname'];
		  $email = $_POST['email'];
		  $password = $_POST['password'];
		  $cpassword = $_POST['cpassword'];
		   
			$error = array();

			if($password == null){
				$error['[password'] = "blank";
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

<link href="style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Creative SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="POST">
					<input class="text" type="text" name="uname" placeholder="Username" required="">
                     <?php if(isset($error['uname'])){ echo $error; } ?>

					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">

					<?php if(isset($error['password'])){ echo $error; } ?>

					<input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<!-- <input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span> -->
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name="register" value="SIGNUP">
				</form>

				
                     <div class="loing" style="color:#FFFFFF; text-align:center; font-size:20px;"><?php if(isset($success)){ echo $success; }  ?></div>
                   
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 saurav Signup Form. All rights reserved </p>
        </div>
        




</body>
</html>
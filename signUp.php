<?php
session_start();
include "DB.php";
include "functions.php";
$role="admin";
$error_msg=' ';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$error_msg = signup($connection,$role);
}     


?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width" charset="UTF-8">	

	</head>
	
	
	
	<body>
		<header>
			<div class="container-header">
				<div class="logo">
					<a href="index.php"> <img src="photos/logo.png" alt="moview" ></a>
				</div> 
				
				<div class="navDiv">
					<nav class="nav">			
						<ul>
							<li class="navli"><a href ="index.php" > Home </a></li>
						</ul>
					</nav>
				</div>
				
				

				
			</div> 
			
		</header>
		
		<main>
			<section class='login' id='login'>
		  
				<div class='head'>
				<h1 class='company'>Admin Sign Up</h1>
				</div>
					<div class='form'>
                                            
                                    <div class="errormsg">
                                            <?php echo $error_msg; ?>
                                    </div>
                                            <form method="POST">
						  <div>
							<input type="text" placeholder='Username' class='text' id='username' name="username" ><br>
						  </div>
						  
						  <div>
							<input type="text" placeholder='First name' class='text' name="first_name" >
						   <br>
						  </div>

						  <div>
							<input type="text" placeholder='Last name' class='text' name="last_name">
						   <br>
						  </div>

						  <div>
							<input type="text" placeholder='Phone Number' class='text' name="phone" >
						   <br>
						  </div>

						  <div>
							<input type="password" placeholder='••••••••••' class='password' id="psw" name="password" >
						   <br>
						  </div>

						  <br><br><br>
						  
							  <div class="buttons"> 
									<input type="submit" value="SignUp" name="signup"class='btn-login'>
								  </br>
								  </br>
							  </div>
							  <p> Already have an acount?     
							  <a href="LogIn.php" class="hero-btn">  log in  </a>	 </p>
	  
					  </form>
				</div>
		  </section>
		</main>
		
		<footer>

				<p>contact us</p>
					<div class="socialmedia">
						<a href="#"><i><img class="zoom" src="photos/youtube.png" alt="youtube"></i></a>
						<a href="#"><i><img class="zoom" src="photos/instagram.png" alt="instagram"></i></a>
						<a href="#"><i><img class="zoom" src="photos/twitter.png" alt="twitter"></i></a>
						<a href="#"><i><img class="zoom" src="photos/facebook.png" alt="facebook"></i></a>
					</div>
				<p>©2022 Moview | Some Rights Reserved</p>
			
		</footer>
		
		
	</body>	
</html>							



















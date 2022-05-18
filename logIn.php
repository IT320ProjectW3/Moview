<?php
session_start();
include "DB.php";
include "functions.php";
$role = "admin";
$error_msg=' ';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$error_msg = login($connection,$role);
}     

?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>Log In</title>
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
				<h1 class='company'>Admin Log in</h1>
				</div>
                                     <div class="errormsg">
									 	<?php echo $error_msg; ?>        
                                     </div>
					<div class='form'>
					  <form  method="POST">
						  <div>
							<input type="text" placeholder='Username' class='text' id='username' name="username"><br>
						  </div>
						  
						  <div>
							<input type="password" placeholder='••••••••••' class='password' id="psw" name="password">
						   <br>
						  </div>
						  <br><br><br>
						  
							  <div class="buttons"> 
									<input type="submit"value="Login" class='btn-login'>
								  </br>
								  </br>
							  </div>
							  <p> New Admin?       
							  <a href="signUp.php" class="hero-btn">Sign Up </a>	 </p>
	  
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


















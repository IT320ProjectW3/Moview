<?php
session_start();
include "DB.php";
include "functions.php";
$role = 'admin';
$user_data = check_login($connection,$role);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$error_msg = checkProfile($connection);
        if($error_msg=="true")
          $user_data=updateProfile($connection);
}  

?>

<!DOCTYPE html>
<html>
	
	<head>
		<title>Profile Page</title>
		<link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width" charset="UTF-8">		
	</head>
	
	
	
	<body>
		<header>
			<div class="container-header">
				<div class="logo">
					<a href="myMoviesPage(admin).php"> <img src="photos/logo.png" alt="moview" ></a>
				</div> 
				
				<div class="navDiv">
					<nav class="nav">			
				<ul>
					<li class="navli"><a href ="myMoviesPage(admin).php"> my movies </a></li>
					<li class="navli"><a href ="addMovie.php" > add movie </a></li>
					<li class="navli"><a href ="profilePage.php" > my profile </a></li>
				</ul>
					</nav>
				</div>

				<div class="logOut">
					<a href ="signout.php"><img src="photos/logout.png" alt="log out"></a>
				</div> 
				
			</div> 
			
		</header>
		
		<main>

			<div class="about-container">
		
			<h2> profile </h2>
			
			<div class="errormsg">
                                <?php if ($error_msg=="true") {?>
                                <p style="background: green;"> <?php echo "The update completed successfully"; ?></p><?php } ?>
                                 <?php if ($error_msg!="true")
                                          echo '<p>'.$error_msg.'</p>';    ?>
			</div>
			              
  
                
                
			<form method="post"  class="movieform">
			
				<label>username : </label>
                                <input style="font-size: 15px; background: #f2f2f2; color: #bfbfbf; " type="text" name="username" class="moformitem" value="<?php echo $user_data['username'];     ?>" disabled="">

				<label>first name : </label>
				<input style="font-size: 15px; " type="text" name="first_name" class="moformitem" value="<?php echo $user_data['first_name'];     ?>">

				<label>last name : </label>
				<input style="font-size: 15px; " type="text" name="last_name" class="moformitem" value="<?php echo $user_data['last_name'];     ?>">				


				
				<label>phone number : </label>
				<input style="font-size: 15px; " type="text" name="phone" class="moformitem" value="<?php echo $user_data['phone'];     ?>">				
				
				<label>password : </label>
                                <input style="font-size: 15px; background: #f2f2f2; color: #bfbfbf; " type="password" name="password" class="moformitem" value="<?php echo $user_data['password'] ; ?>" disabled="">

				
				<input type="submit" value="Update" class="moviesubmit">
				

			
			</form>
		
		</div>		

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











<?php
session_start();
include "DB.php";
include "functions.php";
$role = 'admin';
$user_data = check_login($connection,$role);

if (isset($_POST['submit'])) {
$msg=add_a_Movie($connection);}


?>

<!DOCTYPE html>
<html>
	
	<head>
		<title>Add Movie</title>
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
		
			<h2> Add Movie</h2>

                        <div class="errormsg">
                                <?php if ($msg=="done") {?>
                            <p style="background: green;"><?php echo "The movie has been successfully added "; ?></p><?php } ?>
                                 <?php if ($msg!="done")
                                           echo '<p>'.$msg.'</p>';   ?>                                    
                        </div>
			
                <form method="post" class="movieform"   enctype="multipart/form-data">
			
				<label>Movie Name :</label>
				<input type="text" name="movieName" class="moformitem" placeholder="Enter the name.." style="font-size: 15px; ">
				

				<label>status :</label>
					<select name="status" class="moformitem" style="font-size: 15px; ">
						<option value="coming soon">coming soon</option>
						<option value="available">available</option>
					</select>
					
				<label>Type :</label>
					<ul class="checkboxtype" class="moformitem" >
						<li><input type="checkbox" name="type[]" value="action">Action </li>
						<li><input type="checkbox" name="type[]"  value="comedy">comedy </li>
						<li><input type="checkbox" name="type[]" value="horror">horror </li>
						<li><input type="checkbox" name="type[]" value="science fiction">science fiction </li>
						<li><input type="checkbox" name="type[]" value="adventure">adventure </li>
						<li><input type="checkbox" name="type[]" value="fantasy">fantasy </li>
						<li><input type="checkbox" name="type[]" value="drama">drama </li>
						<li><input type="checkbox" name="type[]" value="thriller">thriller </li>
						<li><input type="checkbox" name="type[]" value="romance">romance </li>
						<li><input type="checkbox" name="type[]" value="crime">crime </li>
						<li><input type="checkbox" name="type[]" value="western">western </li>
						<li><input type="checkbox" name="type[]" value="mystery">mystery </li>
						<li><input type="checkbox" name="type[]" value="biographical">biographical </li>
						<li><input type="checkbox" name="type[]" value="war">war </li>
						<li><input type="checkbox" name="type[]" value="romantic comedy">romantic comedy </li>
						<li><input type="checkbox" name="type[]" value="dark comedy">dark comedy </li>
						<li><input type="checkbox" name="type[]" value="heist">heist </li>
						<li><input type="checkbox" name="type[]" value="historical romance">historical romance </li>
						<li><input type="checkbox" name="type[]" value="historical film">historical film </li>
						<li><input type="checkbox" name="type[]" value="zombie">zombie </li>
						<li><input type="checkbox" name="type[]" value="music">music </li>
						<li><input type="checkbox" name="type[]" value="family">family </li>
						<li><input type="checkbox" name="type[]" value="animation">animation </li>
					</ul>



				
				<label>Story :</label>
				<textarea name="movieStory" cols="64" rows="6" style="font-size: 15px; "></textarea>
				
				<label>Where to watch :</label>
					<ul class="checkboxwatch" class="moformitem" >
						<li><input type="checkbox" name="watch[]" value="netflex">netflex </li>
						<li><input type="checkbox" name="watch[]"  value="AMC Cinemas">AMC Cinemas</li>
						<li><input type="checkbox" name="watch[]" value="muvi cinemas">muvi cinemas</li>
						<li><input type="checkbox" name="watch[]" value="vox cinemas">vox cinemas</li>
						<li><input type="checkbox" name="watch[]" value="youtube">youtube </li>
						<li><input type="checkbox" name="watch[]" value="disney+">disney+ </li>
						<li><input type="checkbox" name="watch[]" value="OSN">OSN </li>
						<li><input type="checkbox" name="watch[]" value="HBO">HBO </li>
						<li><input type="checkbox" name="watch[]" value="Amazon prime video">Amazon prime video </li>
						<li><input type="checkbox" name="watch[]" value="apple">apple</li>
						<li><input type="checkbox" name="watch[]" value="-">-</li>
					</ul>

				<label>movie poster : </label>
                                <input type="file" class="poster" name="my_image" >
		
				<input type="submit" value="Add" class="moviesubmit" name="submit" >
					
			
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


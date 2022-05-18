<?php
session_start();
include "DB.php";
include "functions.php";
$role = 'admin';
$user_data = check_login($connection,$role);


    if(isset($_GET['id'])){
        $Id = $_GET['id'] ;
           $sql = "SELECT * FROM movie WHERE id='$Id' ";
          $result = mysqli_query($connection, $sql);
          if ($result && mysqli_num_rows($result) > 0) 
            $thisMovie= mysqli_fetch_assoc($result);
        
             $type= $thisMovie['type'];
             $type_= explode(' | ', $type);
             
             $where_to_watch= $thisMovie['where_to_watch'];
             $where_to_watch_= explode(' | ', $where_to_watch);    } 
             
         if (isset($_POST['submit'])) {
          $msg= edit_a_Movie($connection,$_GET['id']);
              if($msg=="done"){
          $thisMovie=updateMovie($connection,$_GET['id']);
             $type= $thisMovie['type'];
             $type_= explode(' | ', $type);
             
             $where_to_watch= $thisMovie['where_to_watch'];
             $where_to_watch_= explode(' | ', $where_to_watch);  }
          
         }
        

?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>Edit Movie</title>
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
		
			<h2> edit Movie</h2>
			
			<div class="errormsg">
                                <?php if ($msg=="done") {?>
                            <p style="background: green;"><?php echo "The movie has been successfully updated "; ?></p><?php } ?>
                                 <?php if ($msg!="done")
                                           echo '<p>'.$msg.'</p>';   ?>
                        </div>
			
			<form method="post" class="movieform" enctype="multipart/form-data">   

                            <img src="<?php echo 'uploads/'.$thisMovie['poster']; ?>" alter="fff" width="110px"; height="160px"; style="float:right; margin-right: 20px; box-shadow: 0 4px 6px rgb(0 0 0 / 30%);">
				<label>Movie Name :</label>
				<input style="font-size: 15px;" type="text" name="movieName" class="moformitem" placeholder="Enter the name.." value="<?php echo $thisMovie['movie_name']; ?>">
				

				<label>status :</label>
					<select name="status" class="moformitem" style="font-size: 15px; ">
						<option value="coming soon" <?php if($thisMovie['status']=="coming soon") echo "selected"; ?> >coming soon</option>
						<option value="available" <?php if($thisMovie['status']=="available") echo "selected"; ?> >available</option>
					</select>
					
				<label>Type :</label>
					<ul class="checkboxtype" class="moformitem" >
                                            <li><input type="checkbox" name="type[]" value="action" <?php  if(in_array('action', $type_)) echo "checked"; ?> >Action </li>
						<li><input type="checkbox" name="type[]"  value="comedy" <?php  if(in_array('comedy', $type_)) echo "checked"; ?>>comedy </li>
						<li><input type="checkbox" name="type[]" value="horror" <?php  if(in_array('horror', $type_)) echo "checked"; ?>>horror </li>
						<li><input type="checkbox" name="type[]" value="science fiction" <?php  if(in_array('science fiction', $type_)) echo "checked"; ?>>science fiction </li>
						<li><input type="checkbox" name="type[]" value="adventure" <?php  if(in_array('adventure', $type_)) echo "checked"; ?>>adventure </li>
						<li><input type="checkbox" name="type[]" value="fantasy" <?php  if(in_array('fantasy', $type_)) echo "checked"; ?>>fantasy </li>
						<li><input type="checkbox" name="type[]" value="drama" <?php  if(in_array('drama', $type_)) echo "checked"; ?>>drama </li>
						<li><input type="checkbox" name="type[]" value="thriller" <?php  if(in_array('thriller', $type_)) echo "checked"; ?>>thriller </li>
						<li><input type="checkbox" name="type[]" value="romance" <?php  if(in_array('romance', $type_)) echo "checked"; ?>>romance </li>
						<li><input type="checkbox" name="type[]" value="crime" <?php  if(in_array('crime', $type_)) echo "checked"; ?>>crime </li>
						<li><input type="checkbox" name="type[]" value="western" <?php  if(in_array('western', $type_)) echo "checked"; ?>>western </li>
						<li><input type="checkbox" name="type[]" value="mystery" <?php  if(in_array('mystery', $type_)) echo "checked"; ?>>mystery </li>
						<li><input type="checkbox" name="type[]" value="biographical" <?php  if(in_array('biographical', $type_)) echo "checked"; ?>>biographical </li>
						<li><input type="checkbox" name="type[]" value="war" <?php  if(in_array('war', $type_)) echo "checked"; ?>>war </li>
						<li><input type="checkbox" name="type[]" value="romantic comedy" <?php  if(in_array('romantic comedy', $type_)) echo "checked"; ?>>romantic comedy </li>
						<li><input type="checkbox" name="type[]" value="dark comedy" <?php  if(in_array('dark comedy', $type_)) echo "checked"; ?>>dark comedy </li>
						<li><input type="checkbox" name="type[]" value="heist" <?php  if(in_array('heist', $type_)) echo "checked"; ?>>heist </li>
						<li><input type="checkbox" name="type[]" value="historical romance" <?php  if(in_array('historical romance', $type_)) echo "checked"; ?>>historical romance </li>
						<li><input type="checkbox" name="type[]" value="historical film" <?php  if(in_array('historical film', $type_)) echo "checked"; ?>>historical film </li>
						<li><input type="checkbox" name="type[]" value="zombie" <?php  if(in_array('zombie', $type_)) echo "checked"; ?>>zombie </li>
						<li><input type="checkbox" name="type[]" value="music" <?php  if(in_array('music', $type_)) echo "checked"; ?>>music </li>
                                               	<li><input type="checkbox" name="type[]" value="family" <?php  if(in_array('family', $type_)) echo "checked"; ?>>family </li>
						<li><input type="checkbox" name="type[]" value="animation" <?php  if(in_array('animation', $type_)) echo "checked"; ?>>animation </li>
					</ul>



				
				<label>Story :</label>
				<textarea name="movieStory" cols="64" rows="6"  style="font-size: 15px;"> <?php echo $thisMovie['story']; ?> </textarea>
				
				<label>Where to watch :</label>
					<ul class="checkboxwatch" class="moformitem" >
						<li><input type="checkbox" name="watch[]" value="netflex" <?php  if(in_array('netflex', $where_to_watch_)) echo "checked"; ?>>netflex </li>
						<li><input type="checkbox" name="watch[]"  value="AMC Cinemas" <?php  if(in_array('AMC Cinemas', $where_to_watch_)) echo "checked"; ?>>AMC Cinemas</li>
						<li><input type="checkbox" name="watch[]" value="muvi cinemas" <?php  if(in_array('muvi cinemas', $where_to_watch_)) echo "checked"; ?>>muvi cinemas</li>
						<li><input type="checkbox" name="watch[]" value="vox cinemas" <?php  if(in_array('vox cinemas', $where_to_watch_)) echo "checked"; ?>>vox cinemas</li>
						<li><input type="checkbox" name="watch[]" value="youtube" <?php  if(in_array('youtube', $where_to_watch_)) echo "checked"; ?>>youtube </li>
						<li><input type="checkbox" name="watch[]" value="disney+" <?php  if(in_array('disney+', $where_to_watch_)) echo "checked"; ?>>disney+ </li>
						<li><input type="checkbox" name="watch[]" value="OSN" <?php  if(in_array('OSN', $where_to_watch_)) echo "checked"; ?>>OSN </li>
						<li><input type="checkbox" name="watch[]" value="HBO" <?php  if(in_array('HBO', $where_to_watch_)) echo "checked"; ?>>HBO </li>
						<li><input type="checkbox" name="watch[]" value="Amazon prime video" <?php  if(in_array('Amazon prime video', $where_to_watch_)) echo "checked"; ?>>Amazon prime video </li>
                                                <li><input type="checkbox" name="watch[]" value="apple"  <?php if(in_array('apple', $where_to_watch_)) echo "checked"; ?> >apple</li>
						<li><input type="checkbox" name="watch[]" value="-" <?php  if(in_array('-', $where_to_watch_)) echo "checked"; ?>> - </li>
					</ul>

				<label>movie poster : </label>
					<input type="file" class="poster"  name="my_image"  >
                                        <p style="display:inline; margin-left: 30px; font-size: 12px;"><span style="font-size: 15px;">Poster : </span><?php echo  $thisMovie['poster']; ?></p>

				<input type="submit" value="Update" class="moviesubmit" name="submit">
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


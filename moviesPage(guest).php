<?php
include "DB.php";

//////////////MY CODE//////////////////

    $sql = "SELECT * FROM movie" ;
    $result = mysqli_query($connection, $sql) ;
    
?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>Movies Page</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
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

                <a href="#"  class="scroll top"          style="font-size: 18px; font-weight: bold;   background-color: #FAF7F2;  color:#ac0f1c;">˄</a>
		<a href="#finish"  class="scroll bottom" style="font-size: 18px; font-weight: bold; background-color: #FAF7F2; color:#ac0f1c;">˅</a>

			<!-- ****************************************Search*************************************************-->
			
			<div class="wrapper">
				<input type="text" id="myInput" class="input" onkeyup="Search()" 
				placeholder="What are you looking for?">
				<div class="searchbtn"><i class="fas fa-search"></i></div>
			</div>	

			<!-- ****************************************Movies*************************************************-->
			<div class="welcome">

				<h3> WELCOME TO MOVIEW !</h3>

			</div>
                       
                        <?php
                        
                        while($rows = mysqli_fetch_assoc($result))
                        {
                            $id = $rows['id'] ;
                            $poster ='uploads/'.$rows['poster'] ;
                            $movie_name = $rows['movie_name'] ;
                            $story = $rows['story'] ;
                            $type = $rows['type'] ;
                            $where_to_watch = $rows['where_to_watch'] ;
                            $status = $rows['status'] ;
                        ?>                        

			<div id="container" class="container">
            
				<div class="card u-clearfix">
				  <div class="card-media">
					<img src="<?php echo("$poster"); ?>" alt="<?php echo("$movie_name"); ?>" class="card-media-img" />
					<span class="card-media-tag card-media-tag-orange"><?php echo("$type"); ?></span>
				  </div>
                                    
				  <div class="card-body">
					<h2 class="card-body-heading"> <?php echo("$movie_name"); ?> </h2>
					<ul class="card-body-info u-clearfix">
						<li class="title">
							Story : 
						</li>
						<li class="content">
                                                        <?php echo("$story"); ?>
                                                <li class="title">
							Were to watch : 
						</li>
						<li class="content">
							<?php echo("$where_to_watch");  ?>
						</li>
						<li class="title">
							Status : 
						</li>
						<li class="content">
							<?php echo("$status");  ?> 
						</li>
					</ul>   
	

                                        
                                     	<a href="viewReviewsPage.php?id=<?php echo $id ;?>  " class="card-button card-button-link">
					  View Reviews
					  <span class="card-button-icon">
						<svg fill="#9C948A" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
						  <path d="M0 0h24v24H0z" fill="none"/>
						  <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
						</svg>
					  </span>
					</a>
                                        
                                        <a href="adminInfo.php?id=<?php echo $id ;?>  " class="card-button card-button-link" >
					  admin info
					  <span class="card-button-icon">
						<svg fill="#9C948A" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
						  <path d="M0 0h24v24H0z" fill="none"/>
						  <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
						</svg>
					  </span>
					</a>                                        
                                        
                                        
                                        
				  </div>
				  
				</div>
					
			  </div>
                        
                        <?php
                        }                          
                        ?>
	
			<div id="finish"></div>
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
		
		<script src="script.js"></script>

	</body>	
</html>							
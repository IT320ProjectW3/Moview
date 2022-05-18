<?php
session_start();
include "functions.php";
include "DB.php";
$role = 'admin';
$user_data = check_login($connection,$role);

//////////////MY CODE//////////////////
    if(isset($_GET['id'])){
        
        $Id = $_GET['id'] ;
        $sql3 = "DELETE FROM movie WHERE id=$Id" ; 
        $result3 = mysqli_query($connection,$sql3) ;
        
        if ($result3) {  
           header('location:myMoviesPage(admin).php');
        }else{  
           echo "Error deleting ";  
        }  
        
    }    
    
    $AdminId = $_SESSION['userId'] ;
    $sql1 = "SELECT * FROM admin WHERE id = $AdminId" ;
    $result1 = mysqli_query($connection, $sql1) ;

    $row = mysqli_fetch_assoc($result1);
    
    $first_name = $row['first_name'] ;
    $last_name = $row['last_name'] ;
    $username = $row['username'] ;
    
    
    $sql2 = "SELECT * FROM movie WHERE adminID = $AdminId" ;
    $result2 = mysqli_query($connection, $sql2) ;
    
?>

<!DOCTYPE html>
<html>
	
	<head>
		<title>My Movies Page</title>
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
                         <a href="#"  class="scroll top"          style="font-size: 18px; font-weight: bold;   background-color: #FAF7F2;  color:#ac0f1c;">˄</a>
		<a href="#finish"  class="scroll bottom" style="font-size: 18px; font-weight: bold; background-color: #FAF7F2; color:#ac0f1c;">˅</a>
			<!-- ****************************************Movies*************************************************-->
			<div class="welcome">

                            <h3> WELCOME <span style="font-size:110%; padding:13px 0 25px 0;font-family: Monospace; font-style:italic;"><?php echo("$first_name"." "."$last_name");  ?></span> </h3>
                            <h3> USERNAME :<p style="font-size:100%; display: inline; color: #6f6f6f; font-family: Monospace; font-style:italic;"> <?php echo("$username");  ?><p> </h3>
	

			</div>
                        
                        <?php
                        
                        while($rows = mysqli_fetch_assoc($result2))
                        {
                            $id = $rows['id'] ;
                            $poster ='uploads/'.$rows['poster'] ;
                            $movie_name = $rows['movie_name'] ;
                            $story = $rows['story'] ;
                            $type = $rows['type'] ;
                            $where_to_watch = $rows['where_to_watch'] ;
                            $status = $rows['status'] ;
                        ?>    
                        
			<div class="container">
                            
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
	
					 <!--   <a href="editMovie.php" class="card-button card-button-cta">
						Edit
					    </a> -->
                                         
                                          <?php
                                            echo("
                                                <a href='editMovie.php?id=".$id."' class='card-button card-button-cta'>
						Edit
					        </a>     
                                            "); 
                                            ?>
                                            
                                            <?php
                                            echo("
                                                <a href='myMoviesPage(admin).php?id=".$id."' class='card-button card-button-cta'>
						Delete
					        </a>     
                                            "); 
                                            ?>
                                        <!--
					    <a href="viewReviewsPage.php" class="card-button card-button-cta">
						View Reviews
					    </a>
                                         -->
                                         <?php
                                            echo("
                                                <a href='viewReviewsPage.php?id=".$id."' class='card-button card-button-cta'>
						View Reviews
					        </a>     
                                            "); 
                                            ?>
                                            
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
		
		
	</body>	
</html>						
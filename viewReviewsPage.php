<?php
session_start();

include "functions.php";
include "DB.php";
$isAdmin = isAdmin();

if($isAdmin=="true"){
    $role="admin";
$user_data = check_login($connection,$role);
}
  if(isset($_GET['id'])){
        $Id = $_GET['id'] ;
           $sql = "SELECT * FROM movie WHERE id='$Id' ";
          $result = mysqli_query($connection, $sql);
          if ($result && mysqli_num_rows($result) > 0) 
                $thisMovie= mysqli_fetch_assoc($result);}   
               
                
   if (isset($_POST['submit']) ){
       if(empty($_POST['review'])) 
             $msg= "please fill ou the empty field ! ";
        else{
           $insertReview =insertReview($connection,$_GET['id']);
           $msg= "done";}
}
        
    $sql2 = "SELECT * FROM review WHERE movie_id ='$Id' " ;
    $result2 = mysqli_query($connection, $sql2) ;
    $num= mysqli_affected_rows($connection);

?>

<!DOCTYPE html>
<html>
	
	<head>
		<title>View Review Page</title>
		<link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width" charset="UTF-8">	
        
	</head>
	
	
	
	<body>
		<header>
			<div class="container-header">
				<div class="logo">
                                        <a href='myMoviesPage(admin).php'> <img src="photos/logo.png" alt="moview" ></a>
				</div> 
                                                        
				<div class="navDiv">
					<nav class="nav">			
						<ul>
				<?php if ( isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                                echo "<li class='navli'><a href ='myMoviesPage(admin).php'>  my movies </a></li>";
                                echo "<li class='navli'><a href ='addMovie.php'>  add movie  </a> </li>";
                                echo "<li class='navli'><a href ='profilePage.php'>  my profile </a></li>";
                                }else{
                                   echo "<li class='navli'><a href ='index.php'> home </a></li>";
                                   echo "<li class='navli'><a href ='moviesPage(guest).php'> movies </a></li>";

                                }?>
						</ul>
					</nav>
				</div> 
				
                            
				<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
			        echo "<div class='logOut'>";
				   echo  "<a href ='signout.php'><img src='photos/logout.png' alt='log out'></a>";
                                echo" </div>";} ?>
				
			</div> 
			
		</header>                                                
                                                
                                                
		<main>
                <a href="#"  class="scroll top"          style="font-size: 18px; font-weight: bold;   background-color: #FAF7F2;  color:#ac0f1c;">˄</a>
		<a href="#finish"  class="scroll bottom" style="font-size: 18px; font-weight: bold; background-color: #FAF7F2; color:#ac0f1c;">˅</a>                                
                                
			<div id="container" class="container" class="d1">
                                
                            
                            <div class="card u-clearfix">
				  <div class="card-media">
                                        <?php 
                            $movie_name = $thisMovie['movie_name'] ;
                            $story = $thisMovie['story'] ;
                            $type = $thisMovie['type'] ;
                            $where_to_watch = $thisMovie['where_to_watch'] ;
                            $status = $thisMovie['status'] ;
                            $poster ='uploads/'.$thisMovie['poster'] ; ?>
                                      
                                      
					<img  src="<?php echo("$poster"); ?>" alt="<?php echo("$movie_name");  ?>" class="card-media-img" />

					<span class="card-media-tag card-media-tag-orange"><?php echo("$type"); ?></span>
				  </div>

				  <div class="card-body">
					<h2 id="MovieName" class="card-body-heading" style="font-size:large;"><?php echo("$movie_name");  ?></h2>
					
					<ul id="card-body-info u-clearfix" class="card-body-info u-clearfix">
						<li class="title" style="font-size:large;">
							Story : 
						</li>
						<li class="content" style="font-size:large;" >
                                                        <?php echo("$story");   ?>
                                                <li class="title" style="font-size:large;">
							Were to watch : 
						</li>
						<li class="content" style="font-size:large;" class="link">
                                                    <?php echo("$where_to_watch");   ?>        
                                                </li>
						<li class="title" style="font-size:large;">
							Status : 
						</li>
						<li class="content" style="font-size:large;">
                                                <?php echo("$status");   ?> 
						</li>
                                                
                                                <?php if (!isset($_SESSION['role']) && $_SESSION['role'] != 'admin') 
                                                  echo'<span style="float: right; "> <a href="#formR" style="text-decoration: none; color:white; background:#ac0f1c; padding:8px; border-radius: 6px; font-size:15px;">Post a review<a></span>'?>
					</br></br></br>
					
					</ul>  
					
					
	
				  </div>
				 

				</div>

			 
				<section id="testimonials">
					<!--heading--->
					<div class="testimonial-heading">
                                            <h1>Reviews <span style="float: right;"><?php echo $num;?></span></h1>
					</div>
                                        
					<!--testimonials-box-container------>
					<div class="testimonial-box-container" >
                                            
                                            <?php  while($reviews = mysqli_fetch_assoc($result2)){?>
                        

						<!--BOX-1-------------->
						<div class="testimonial-box">
							<div class="box-top">
                                                                <div class="name-user">
									<strong> Anonymous </strong>
								</div>
								
							</div>
							<!--Comments---------------------------------------->
                                                        <div class="client-comment">
								<p><?php echo $reviews['review'];  ?></p>
							</div>
                                            </div> <?php }?>
						

					</div>
				</section >
				
		<?php if (!isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
                          echo "<form method='post' id='formR'>";
                           echo "<label class='labelpost'>post a review :</label>";
                           echo "<div class='errormsg'>";
                           if ($msg=="done"){
                              echo '<p style="background: green;"> the review has been successfully posted !</p></div>';}
                           else if ($msg!="done"){
                              echo  '<p>'.$msg."</p></div>";}
                           echo "<textarea name='review' cols='64' rows='6' class='post'></textarea>";
                           echo "<input type='submit' value='POST' class='moviesubmit' name='submit'>";
                           echo "</form>";
                } ?>
				
	

	</div>

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


 




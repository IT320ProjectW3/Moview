<?php
include "DB.php";

  if(isset($_GET['id'])){
      
        $Id = $_GET['id'] ;
           $sql = "SELECT * FROM movie WHERE id='$Id' ";
          $result = mysqli_query($connection, $sql);
          if ($result && mysqli_num_rows($result) > 0) 
                $movie= mysqli_fetch_assoc($result);
          
          $adminId=$movie['adminID'];
          
        $sql2 = "SELECT * FROM admin WHERE id='$adminId' ";
        $result2 = mysqli_query($connection, $sql2);
          if ($result2 && mysqli_num_rows($result2) > 0) 
                $adminInfo= mysqli_fetch_assoc($result2);
          
          
        $sql3 = "SELECT * FROM movie WHERE adminID='$adminId' ";
        $result3 = mysqli_query($connection, $sql3);
        $num= mysqli_affected_rows($connection);
 
          
  }  
                
             
?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>Admin Info</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <meta name="viewport" content="width=device-width" charset="UTF-8">	
        
        <style>
    .admininfo{
               font-size: 15px;
               text-align: center;
               color:#ac0f1c;
               text-transform: capitalize;
               font-weight: bold;
               padding:6px;
                
           }
           
    .admininfo span{
               color:#4d4d4d;
               text-transform:none;
           }
   .about-container{
	height:600px;

            }
               

.list-admin-movie{
    height: 240px;
    overflow: auto;
    margin-top: 70px;

}
    
table{
	width:100%; 
	border-collapse: double;
	border-spacing: 0;
        box-shadow:2px 2px 12px rgba(0,0,0,0.2);


}
caption{
	position: sticky;
	top: 0;
	width:100%; 
	font-family: 'Open Sans',Sans-serif;
	text-transform: uppercase;
	text-align: center;
	font-weight:bold;	
	font-size:100%;
	color:white;
        padding:4px 0;
	background-color:#4d4d4d;
}
          
td{
	padding: 15px 0;
	text-align: center;
        background-color: #fdfcfc;	
}


th{
    	padding: 5px 5px;
	text-align: center;
        background-color: #f2f2f2;
        position: sticky;
	top: 25px;
	width:80%; 
	font-family: 'Open Sans',Sans-serif;
	text-transform: uppercase;
    
}
td a{
   text-decoration: none; 
    font-family:Arial ;             
    text-transform: capitalize;  
    color: black ;

}

td a:hover{
	color:#ac0f1c;	
}


        </style>
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
                                                        <li class='navli'><a href ='moviesPage(guest).php'> movies </a></li>

						</ul>
					</nav>
				</div> 
				

				
			</div> 
			
		</header>
		
		<main>

                    
			<div class="about-container">
		
                            <h2 style="text-transform:none;"><?php echo $adminInfo['username'];  ?></h2><br>
			
                        			
				<p class="admininfo">name : <span><?php echo $adminInfo['first_name']." ".$adminInfo['last_name']; ?></span> </p>

				<p class="admininfo">phone number :<span> <?php echo $adminInfo['phone']; ?></span></p>
                                
				<p class="admininfo">number of movies : <span><?php echo $num; ?> </span></p>
				
                                
                                <div class="list-admin-movie">
                                    <table>
                                        <caption>movies</caption>
                                        <tr><th class='big'>movie name</th><th>number of reviews</th></tr>
                                        <?php
                                        while($assocmovies= mysqli_fetch_assoc($result3)){
                                                $sql2 = "SELECT * FROM review WHERE movie_id ='".$assocmovies['id']."' " ;
                                                 $result2 = mysqli_query($connection, $sql2) ;
                                                 $num= mysqli_affected_rows($connection);

                                            echo "<tr><td><a class='big' href='viewReviewsPage.php?id=".$assocmovies['id']."'>".$assocmovies['movie_name']."</a></td><td>".$num."</td></tr>";
                                            
                                         }
                                        ?>
                                      
                                    </table>
                                </div>
					
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
		
		<script src="script.js"></script>

	</body>	
</html>							
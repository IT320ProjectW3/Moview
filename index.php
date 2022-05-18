
<!DOCTYPE html>
<html>
	
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width" charset="UTF-8">		

	</head>
	
	
	
	<body >
		<div class="HomePage">
			<header>
				<div class="container-header">
					<div class="logo">
						<a href="index.php"> <img src="photos/logo.png" alt="moview" ></a>
					</div> 

				</div> 
				
			</header>

			
			<main>

			<!---	<div class="row"> -->
				<div class="content">
					
					<h1>Moview</h1>
					<a href="moviesPage(guest).php" class="hero-btn2"> Guest
					</a>
				</div>

			
			<div class="content">
				<a href="signUp.php" class="hero-btn2"> Sign Up As  Admin
			</a>
			</div>

				<div class="content">
					<a href="logIn.php" class="hero-btn2"> Log In As  Admin
					</a>
				</div>


				<br><br><br><br><br><br><br><br><br>
			</main>
		</div>
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




<style>

.content{
	text-align: center;
}
.content h1{
	font-size:160px;
	color: #fff;
	font-weight: 600;
	transition: 0.5s;
}
.content h1:hover{
	-webkit-text-stroke: 2px #fff;
	color: transparent;
}
.content a{
	text-decoration: none;
	display: inline-block;
	color: #fff;
	font-size:24px;
	border: 2px solid #fff;
	padding: 14px 70px;
	border-radius: 50px;
	margin-top: 20px;
}
.content a:hover{
	-webkit-text-stroke: 2px #fff;
	color: transparent;
}
</style>









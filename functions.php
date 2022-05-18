<?php
include "DB.php";

function check_login($connection, $role) { //for security (check if user has logged in) 
  if (isset($_SESSION['userId']) && isset($_SESSION['role'])) {
    if ($role == "admin") {
      if ($role == $_SESSION['role']) {
        if (isset($_SESSION['userId'])) {
          $id = $_SESSION['userId'];
          $sql = "SELECT * FROM admin WHERE id = '$id' limit 1";
          $result = mysqli_query($connection, $sql);
          if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
          }
        }
      }
    }
  }
 
 header("Location: index.php");
}

function isAdmin()
{

  if (isset($_SESSION['role']) && ($_SESSION['role'])=="admin") 
      return "true";
  else 
     return "false";
  

}


function signup($connection, $role)
{
  $username = $_POST['username'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $msg = "";

  if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($phone) && !empty($password)) {
    if (preg_match('/^[a-zA-Z0-9]{5,15}+$/', $username)) {
      $sql = "select username from admin where username ='$username' ";
      $result = $connection->query($sql);
      if ($result->num_rows > 0) {
        $msg = "This admin is already exists ,please try again with correct username";
        return $msg;
      } else if (preg_match('/^[a-zA-Z]{2,15}+$/', $first_name) && preg_match('/^[a-zA-Z]{2,20}+$/', $last_name)) {
        if (preg_match('/^[0]{1}[5]{1}[0-9]{8}+$/', $phone)) {
                if( preg_match('/^[a-zA-Z0-9]{8,}+$/', $password)){
                             $newPass = password_hash($password, PASSWORD_DEFAULT);
                            $sql2 = "insert into admin (username,first_name,last_name,phone,password) values ('$username','$first_name','$last_name','$phone','$newPass')";

                     mysqli_query($connection, $sql2);


                     $sql3 = "select * from admin where username ='$username' ";
                     $result3 = mysqli_query($connection, $sql3);
                     $row = mysqli_fetch_assoc($result3);

                     $_SESSION['userId'] = $row['id'];
                     $_SESSION['role'] = "admin";

                     header("Location:myMoviesPage(admin).php");
                }else{
                         $msg = "password should be at least 8 or more characters (letters , numbers) without spicial characters";
                         return $msg;   
                    }
        } else {
                $msg = "the phone number should start with 05 and contain 10 number in total like 05XXXXXXXX";   
                return $msg;
               }
      } else {
        $msg = "first name and last name must be characters and more than 2";
        return $msg;
             }
    } else {
      $msg = "username must be 5-15 characters (letters , numbers) without spicial characters";
      return $msg;
           }
  } else {
    $msg = "Please try again and make sure you fill out all the fields !";
  }

  return $msg;
}



function login($connection, $role)
{

  if ($role == "admin") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (!empty($username) && !empty($password)) {
      if ((preg_match('/^[a-zA-Z0-9]{5,15}+$/', $username)) && (preg_match('/^[a-zA-Z0-9]{8,}+$/', $password))) {

        $sql = "select * from admin where username ='$username' ";
        $result = mysqli_query($connection, $sql);


        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {


              $_SESSION['userId'] = $row['id'];
              $_SESSION['role'] = "admin";

              header("Location: myMoviesPage(admin).php");
            }
          }
          $msg = "wrong username or Password";
          return $msg;
        } else {
          $msg = "wrong username or Password";
          return $msg;
        }
      } else {
        $msg = "wrong username or Password";
        return $msg;
      }
    } else {
      $msg = "please fill out the empty fields";
      return $msg;
    }
  } 
}



// +++++++++++++++++++ profile page +++++++++++++++++++++++++++++++++++++++++
function checkProfile($connection){
    
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone = $_POST['phone'];
    
    $id = $_SESSION['userId'];
    $sql = "SELECT * FROM admin WHERE id = '$id' limit 1";
    $result = mysqli_query($connection, $sql);
             if ($result && mysqli_num_rows($result) > 0) {
                     $userdata= mysqli_fetch_assoc($result);  
         if($userdata['first_name']==$first_name && $userdata['last_name']==$last_name && $userdata['phone']==$phone )
                           return "you did not change any thing ,Please try again ";
             }
             
             
             
        if (!empty($first_name) && !empty($last_name) && !empty($phone) ) {
               if (preg_match('/^[a-zA-Z]{2,15}+$/', $first_name) && preg_match('/^[a-zA-Z]{2,20}+$/', $last_name)) {
                      if (preg_match('/^[0]{1}[5]{1}[0-9]{8}+$/', $phone)) {
                                $sql2 = "UPDATE admin set first_name='$first_name', last_name='$last_name' ,phone='$phone' WHERE id ='$id'";
                                mysqli_query($connection, $sql2);
                                return "true";
                      }
                      else{
                          return "the phone number should start with 05 and contain 10 number in total like 05XXXXXXXX";
                      }
               } else{
                        return "first name and last name must be characters and more than 2";
               }

        }else{
              return "Please try again and make sure you fill out all the fields !";
        }


    
    
}



function updateProfile($connection){
        $id = $_SESSION['userId'];
          $sql = "SELECT * FROM admin WHERE id = '$id' limit 1";
          $result = mysqli_query($connection, $sql);
          if ($result && mysqli_num_rows($result) > 0) 
            return mysqli_fetch_assoc($result);
}




// ++++++++++++++++++++++++++++++ add movie ++++++++++++++++++++++++++++


function add_a_Movie($connection){
 
 if(!empty($_POST['movieName']) && !empty($_POST['status']) && !empty($_POST['type']) && !empty($_POST['movieStory']) && !empty($_POST['watch']) &&  isset($_FILES['my_image'])  ){

  $id = $_SESSION['userId'];
  $movie_name = mysqli_real_escape_string($connection,$_POST['movieName']);
  $status = $_POST['status'];
  $type = $_POST['type'];
  $story = mysqli_real_escape_string($connection,$_POST['movieStory']);
  $where_to_watch= $_POST['watch'];
  
  $type_= implode(' | ', $type);
  $where_to_watch_= implode(' | ', $where_to_watch);


	$img_name = $_FILES['my_image']['name'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {

			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("Poster-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                                
				// Insert into Database

                              $insert = "INSERT INTO movie (movie_name,status,type,story,where_to_watch,poster,adminID) VALUES ('$movie_name','$status','$type_','$story','$where_to_watch_','$new_img_name','$id')";
                                $add_movie = $connection->query($insert);
				$msg = "done";
                                return $msg;
                        }else {
				$msg = "You can't upload files of this type , you can only upload (jpg, jpeg, png)";
                                return $msg;
			}
	}else {
		$msg = "unknown error occurred , Please try again ";
                      return $msg;
	}

} else {
    		$msg = "Please try again and make sure you fill out all the fields ! ";
           return $msg;
}
    
    
}


// ++++++++++++++++++++++++++++++ edit movie ++++++++++++++++++++++++++++


function edit_a_Movie($connection,$id){

 if(!empty($_POST['movieName']) && !empty($_POST['status']) && !empty($_POST['type']) && !empty($_POST['movieStory']) && !empty($_POST['watch']) ){
                      
  $movie_name = mysqli_real_escape_string($connection,$_POST['movieName']);
  $status = $_POST['status'];
  $type = $_POST['type'];
  $story = mysqli_real_escape_string($connection,$_POST['movieStory']);
  $where_to_watch= $_POST['watch'];
  
 $type_= implode(' | ', $type);
  $where_to_watch_= implode(' | ', $where_to_watch);
     
     if(!file_exists("uploads/".$_FILES['my_image']['name'])){



	$img_name = $_FILES['my_image']['name'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {

			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("Poster-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// UPDATE
                                $update = "UPDATE movie set movie_name='$movie_name',status='$status',type='$type_',story='$story',where_to_watch='$where_to_watch_',poster='$new_img_name' WHERE id ='$id'";
                                $updateMovie = $connection->query($update);
				$msg = "done";
                                return $msg;
                        }else {
				$msg = "You can't upload files of this type , you can only upload (jpg, jpeg, png)";
                                return $msg;
			}
		
	}else {
		$msg = "unknown error occurred , Please try again ";
                      return $msg;
	}
        }else{
            
         // IUPDATE
             $update = "UPDATE movie set movie_name='$movie_name',status='$status',type='$type_',story='$story',where_to_watch='$where_to_watch_' WHERE id ='$id'";
             $updateMovie = $connection->query($update);
             $msg = "done";
            return $msg;   
            
            
        }
 }else{
     return "Please try again and make sure you fill out all the fields ! ";
 }

    
    
}


function updateMovie($connection,$id){
          $sql = "SELECT * FROM movie WHERE id = '$id' limit 1";
          $result = mysqli_query($connection, $sql);
          if ($result && mysqli_num_rows($result) > 0) 
            return mysqli_fetch_assoc($result);
}



   

//++++++++++++++++++++++++++++ post reviews +++++++++++++++++++++++++++++++++



function insertReview($connection,$movieid){
    $review = mysqli_real_escape_string($connection,$_POST['review']);

    $insert = "INSERT INTO review (review ,movie_id) VALUES ('$review','$movieid')";
    $add_review = $connection->query($insert);

}
<?php
    define("DBHOST", "localhost");//:
    define("DBUSER", "root");
    define("DBPASS","root");
    define("DBNAME","moview");
    
    $connection = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
    $error = mysqli_connect_error();
    if ($error != null){
        exit("on connection to the database". $error);//TODO *remove error msg*
    }
?>

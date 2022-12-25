<?php
require('db.php');

session_start();

$username = $_SESSION['username'];

$q= "Select DISTINCT(provider_username) FROM saved_provider WHERE customer_username = '$username' ORDER BY created_datetime DESC;";

$res6=mysqli_query($con,$q);
	if(mysqli_num_rows($res6)>0){

      

        
         while($row6=mysqli_fetch_assoc($res6)){
            $_SESSION['spn'] = $row6['provider_username'];
            echo " <h3><a href = 'rate.php'>{$row6['provider_username']}<a/></h3>";
        }
    }


?>
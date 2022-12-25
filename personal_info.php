<?php
require('db.php');
session_start();

 $username = $_SESSION['username'];

$query2 =  "SELECT * FROM `customers` WHERE username='$username'
"; 
 $result2 = mysqli_query($con, $query2)  or die(mysql_error());
 $rows2 =  mysqli_fetch_assoc($result2);

 echo "<strong>Fullname</strong>: ".$rows2['fullname'];
 echo "<br>";
 echo "<strong>Username</strong>: ".$rows2['username'];
 echo "<br>";
 echo "<strong>Address</strong>: ".$rows2['address'];
 echo "<br>";
 echo "<strong>Email</strong>: ".$rows2['email'];
 echo "<br>";
 echo "<strong>Phone number</strong>: ".$rows2['phone'];
 echo "<br>";
 echo "<strong>Joined</strong>: ".$rows2['create_datetime'];
 echo "<br>";
 echo "<strong>Average Rating</strong>: ".$rows2['rating'];
 echo "<br><br><br><br><br><br>";
 ?>

 <?php

 $username = $_SESSION['username'];

 if (isset($_REQUEST['n_password'])){
 $o_password = stripslashes($_REQUEST['o_password']);
        $o_password = mysqli_real_escape_string($con, $o_password);

$n_password = stripslashes($_REQUEST['n_password']);
        $n_password = mysqli_real_escape_string($con, $n_password);

$query3 =  "SELECT * FROM `customers` WHERE username='$username'
        AND password='" . md5($o_password) . "'";

$result3 = mysqli_query($con, $query3);
        $rows3 = mysqli_num_rows($result3);

if($rows3==1){
	$sql_q_p="UPDATE Customers SET password = MD5('$n_password') WHERE username = '$username';";

mysqli_query($con, $sql_q_p);
echo "Password changed successfully!";

}
else{
    echo "Current password did not match <br>";
    
}
 }

 ?>

<form class="form" action="" method="post">
<h1>Change password</h1>
<br>
<input type="password" class="login-input" name="o_password" placeholder="Current Password"/>
<input type="password" class="login-input" name="n_password" placeholder="New Password"/>
<input type="submit" value="Login" name="submit" class="login-button"/>
</form>



<?php
 echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
 echo "<p><a href='customer_dashboard.php'>Back to Dashboard</a></p>";






?>
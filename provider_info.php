<div>
<link rel="stylesheet" href="style.css"/>
<?php
require('db.php');
session_start();

 
    $p_name = $_SESSION['username'];
$sql5="SELECT c.fullname, c.username, c.address,c.email, c.phone, c.create_datetime
 as 'joined date', CAST(AVG(r.rating) AS DECIMAL(10,2))as 'rating' FROM providers as c, review as r WHERE r.provider_username = '$p_name' AND
  r.provider_username = c.username";
       
	$res5=mysqli_query($con,$sql5);
	if(mysqli_num_rows($res5)>0){
        echo"<table border='1'>";
        echo"<tr><td><strong>Full name</strong></td><td><strong>Username</strong></td><td><strong>Address</strong></td>
        <td><strong>Email</strong></td><td><strong>Phone</strong></td><td><strong>joined date</strong></td><td><strong>Average Rating</strong></td></tr>";
         while($row5=mysqli_fetch_assoc($res5)){
        
            echo "<tr><td>{$row5['fullname']}</td><td>{$row5['username']}</td><td>{$row5['address']}</td><td>{$row5['email']}</td><td>{$row5['phone']}</td><td>{$row5['joined date']}</td><td>{$row5['rating']}</td></tr>";

        }
    
        echo"</table>";
    }
        ?>
        </div>

 <?php
 
 $username = $_SESSION['username'];

 if (isset($_REQUEST['n_password'])){
 $o_password = stripslashes($_REQUEST['o_password']);
        $o_password = mysqli_real_escape_string($con, $o_password);

$n_password = stripslashes($_REQUEST['n_password']);
        $n_password = mysqli_real_escape_string($con, $n_password);

$query3 =  "SELECT * FROM `providers` WHERE username='$username'
        AND password='" . md5($o_password) . "'";

$result3 = mysqli_query($con, $query3);
        $rows3 = mysqli_num_rows($result3);

if($rows3==1){
	$sql_q_p="UPDATE providers SET password = MD5('$n_password') WHERE username = '$username';";

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


<div>
<h3>Enter category to delete"<h3>

<form class="form" action="" method="post">
<input type="text" class="login-input" name="dlt" placeholder="Username" required />
<input type="submit" name="submit" value="Delete" class="register-button">
</form>
</div>

<?php

$username = $_SESSION['username'];

 if (isset($_REQUEST['dlt'])){
 $dlt = stripslashes($_REQUEST['dlt']);
$dlt = mysqli_real_escape_string($con, $dlt);



$query_d =  "DELETE FROM category WHERE category_name = '$dlt' AND providers = '$username';";
$s=mysqli_query($con,$query_d);

echo "<br>Deleting $dlt";
 }


?>





<?php
echo "<br><br><br><br><br><br><br><br><br><br>";

echo "<div>";
$un = $_SESSION['username'];

echo "<strong>list of categories: </strong>";

$sql33 = "SELECT DISTINCT(category_name) FROM category WHERE providers = '$un'"; 

$res6=mysqli_query($con,$sql33);
	if(mysqli_num_rows($res6)>0){
        
         while($row6=mysqli_fetch_assoc($res6)){
        
            echo " {$row6['category_name']},";

        }
    }


echo "</div>";




 echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
 echo "<p><a href='provider_dashboard.php'>Back to Dashboard</a></p>";






?>
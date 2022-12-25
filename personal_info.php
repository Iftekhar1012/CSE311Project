<div>
<link rel="stylesheet" href="style.css"/>
<?php
require('db.php');

session_start();

 
    $p_name = $_SESSION['username'];
$sql5="SELECT * FROM customers where username = '$p_name'; ";
       
	$res5=mysqli_query($con,$sql5);
	if(mysqli_num_rows($res5)>0){
        echo"<table border='1'>";
        echo"<tr><td><strong>Full name</strong></td><td><strong>Username</strong></td><td><strong>Address</strong></td>
        <td><strong>Email</strong></td><td><strong>Phone</strong></td><td><strong>joined date</strong></td></tr>";
         while($row5=mysqli_fetch_assoc($res5)){
        
            echo "<tr><td>{$row5['fullname']}</td><td>{$row5['username']}</td><td>{$row5['address']}</td><td>{$row5['email']}</td><td>{$row5['phone']}</td><td>{$row5['create_datetime']}</tr>";

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
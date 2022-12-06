<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" /> <!--stylesheet not added yet-->
</head>
<body>
    <div class="form">
        <?php 
        $sql = "SELECT id FROM users";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        echo $row['id']+3;
        
        ?>
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
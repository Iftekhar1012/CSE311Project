<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("db.php");



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Service provider dashboard</title>
    <link rel="stylesheet" href="style.css" /> <!--stylesheet not added yet-->
</head>
<body>
    <div class="form">
        <?php 
        $sql = "SELECT username FROM `providers`";
        $result = mysqli_query($con,$sql);
       // $row = mysqli_fetch_assoc($result);

        
        
        
        ?>
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <?php $un=$_SESSION['username']; 
        

        ?>
        <p>You are now on service provider dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>

    <div>
    <h1><a href="provider_info.php">Contact information</a></h1>
    <h1><a href="category1.php">Create a new category</a></h1>
    <h1><a href= "search1.php">Browse Category</a></h1>
    <h1><a href='#'>Inbox</a></h1>
    
    </div>
    
</body>
</html>
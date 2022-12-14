<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/> <!--stylesheet not added yet-->
</head>
<body>
<?php
    require('db.php');
    
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `providers` WHERE username='$username'
                     AND password='" . md5($password) . "'";

        $query2 =  "SELECT * FROM `customers` WHERE username='$username'
        AND password='" . md5($password) . "'";

        $result = mysqli_query($con, $query)  or die(mysql_error());
        $rows = mysqli_num_rows($result);
        $result2 = mysqli_query($con, $query2)  or die(mysql_error());
        $rows2 = mysqli_num_rows($result2);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: provider_dashboard.php");
        }

        elseif($rows2 == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: customer_dashboard.php");
        }


        
        
        else {
            echo "<div class='form'>
                  <h3>Incorrect Username or password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>
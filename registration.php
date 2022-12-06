<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/> <!--stylesheet not added yet-->
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $fullname    = stripslashes($_REQUEST['fullname']);
        $fullname    = mysqli_real_escape_string($con, $fullname);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $address    = stripslashes($_REQUEST['address']);
        $address    = mysqli_real_escape_string($con, $address);
        $phone    = stripslashes($_REQUEST['phone']);
        $phone    = mysqli_real_escape_string($con, $phone);
    

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
       
        $rd_name =  isset($_POST["type_of"]);

        if($rd_name=="customer"){
            $create_datetime = date("Y-m-d H:i:s");
            $query    = "INSERT into `customers` (username, fullname, address, phone, password, email, create_datetime)
                         VALUES ('$username','$fullname','$address','$phone', '" . md5($password) . "', '$email', '$create_datetime')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                      </div>";
            }
        }

        elseif ($rd_name=="provider") {
            $create_datetime = date("Y-m-d H:i:s");
            $query    = "INSERT into `providers` (username, fullname, address, phone, password, email, create_datetime)
            VALUES ('$username','$fullname','$address','$phone', '" . md5($password) . "', '$email', '$create_datetime')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                      </div>";
            }
        }
       
      
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="fullname" placeholder="Full name" >
        <input type="text" class="login-input" name="email" placeholder="Email Address" >
        <input type="text" class="login-input" name="address" placeholder="Address" >
        <input type="text" class="login-input" name="phone" placeholder="Phone number" >
        <input type="password" class="login-input" name="password" placeholder="Password" >
        <input type="radio" name="type_of"
        <?php if (isset($type_of) && $type_of=="customer") echo "checked";?>
            value="customer">Customer
            <input type="radio" name="type_of"
        <?php if (isset($type_of) && $type_of=="provider") echo "checked";?>
        value="provider">Provider

        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
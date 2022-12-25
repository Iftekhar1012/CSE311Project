<html>
<link rel="stylesheet" href="style.css"/>
    <head>
<title>Post</title>
</head>

<body>
    


    <?php
require('db.php');
session_start();
$cat=$_SESSION['cat'];

echo "<h1>Make a post<h1>";
echo "<h3>Category: $cat</h3> ";

if (isset($_REQUEST['textarea'])){
    
    $user = $_SESSION['username'];
    $txt = $_REQUEST['textarea'];
    $create_datetime = date("Y-m-d H:i:s");

    $sql8="INSERT INTO post(Customer_Username,Catergory_name,Description,Post_Date)
    VALUES('$user','$cat','$txt','$create_datetime')";

$result = mysqli_query($con, $sql8)  or die(mysql_error());
echo "Posted <br><br><br><br><br><br>";
echo "<a href='customer_dashboard.php'>Return to dashboard</a>"; 
}




?>
<form>
<textarea id="textarea" name="textarea" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" name="submit" value="submit" class="submit-button">
      </form>
    </div>
<body>

</html>
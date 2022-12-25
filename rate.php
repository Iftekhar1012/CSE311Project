
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Rate</title>
      <style media="screen">

       
    body{
    background: white;
    color: black;
    margin: 100px auto;
    }
    
    .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: left;
    }
    
    
    .rating > input{ display:none;}
    
    .rating > label {
    position: relative;
    width: 20px;
    font-size: 20px;
    color: #FFD700;
    cursor: pointer;
    }
    
    .rating > label::before{
    content: "\2605";
    position: absolute;
    opacity: 0;
    }
    
    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
    opacity: 1 !important;
    }
    
    .rating > input:checked ~ label:before{
    opacity:1;
    }
    
    .rating:hover > input:checked ~ label:before{ opacity: 0.4; }
    
    
    
    
  





</style>
    </head>
    <body>
<?php 
require('db.php');
session_start();

$p_name = $_SESSION['spn'];

echo "<h2>$p_name</h2>";

?>
        
        <h1 style="text-color: rgb(184, 202, 49) ">Rating and comment</h1>
        <br>
   
<div>
    <?php
    $p_name = $_SESSION['spn'];
$sql5="SELECT fullname, username, address,email, phone, create_datetime
 as 'joined date', rating   FROM providers WHERE username = '$p_name' ";
       
	$res5=mysqli_query($con,$sql5);
	if(mysqli_num_rows($res5)>0){
        echo"<table border='1'>";
        echo"<tr><td><strong>Full name</strong></td><td><strong>Username</strong></td><td><strong>Address</strong></td>
        <td><strong>Email</strong></td><td><strong>Phone</strong></td><td><strong>joined date</strong></td><td><strong>Average Rating</strong></td></tr>";
        while ($row5=mysqli_fetch_assoc($res5)){
        
            echo "<tr><td><strong>{$row5['fullname']}</strong></td><td><strong>{$row5['username']}</strong></td><td><strong>{$row5['address']}</strong></td><td><strong>{$row5['email']}</strong></td><td><strong>{$row5['phone']}</strong></td><td><strong>{$row5['joined date']}</strong></td><td><strong>{$row5['rating']}</strong></td></tr>";

        }
    
        echo"</table>";
    }
        ?>

<form class="form" action="" method="post">

<div class="rating">
      
      <input type="radio" name="star" value="5" id="5"><label for="5">☆</label>
      <input type="radio" name="star" value="4" id="4"><label for="4">☆</label>
      <input type="radio" name="star" value="3" id="3"><label for="3">☆</label>
      <input type="radio" name="star" value="2" id="2"><label for="2">☆</label>
      <input type="radio" name="star" value="1" id="1"><label for="1">☆</label>
    </div>
        <div>
        <textarea id="txtarea" name="txtarea" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" name="submit" value="submit" class="submit-button">
      </form>
    </div>

<div>
<form method="post">
        <input type="submit" name="saved"
                value="Save provider"/>
         
    </form>
</div>

    <?php
 $customer_username = $_SESSION['username'];
 $provider_username = $_SESSION['spn'];

 

if (isset($_REQUEST['txtarea'])){
    if(isset($_REQUEST['star'])){
        $txt = $_REQUEST['txtarea'];
        $rating = $_REQUEST['star'];
        $create_datetime = date("Y-m-d H:i:s");
        $sql_rate="INSERT INTO review(customer_username, provider_username, rating, comment, create_datetime)
        VALUES('$customer_username','$provider_username','$rating','$txt', '$create_datetime');";

    $query_rating   = mysqli_query($con, $sql_rate); 

    $query22 = "UPDATE providers SET rating = (SELECT AVG(rating) FROM review WHERE provider_username = '$provider_username') WHERE username = '$provider_username';";
    $query_212   = mysqli_query($con, $query22);

    echo "<a href='customer_dashboard.php.>Return to dashboard</a>";



    }
}

    if(isset($_POST["saved"])) {
        
    
 $dte = date("Y-m-d H:i:s");
      $qu=  "INSERT INTO saved_provider(customer_username, provider_username, created_datetime) VALUES('$customer_username','$provider_username','$dte')";
      $query_213   = mysqli_query($con, $qu);

      echo "<br><h1>Saved!<h1>";
        echo "<br><a href='customer_dashboard.php'>Return to dashboard</a>";
    }
    
   
   

   



?>

      

    
    </body>
    </html>
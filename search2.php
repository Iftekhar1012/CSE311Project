
<html>
<link rel="stylesheet" href="style.css"/>
    <head>
        <title>search</title>
</head>

<body>
<form method="post">
	<input type="textbox" name="str" required/>
	<input type="submit" name="submit" value="Search category"/>
</form>

<?php
include('db.php');

session_start();


$un = $_SESSION['username'];
echo "Hello ".$un;
echo "<br><br>";



if(isset($_POST['submit'])){
	
    $str    = stripslashes($_REQUEST['str']);
    $str    = mysqli_real_escape_string($con, $str);
    $_SESSION['ctn'] = $str;
	$sql="SELECT * FROM category
    WHERE category_name = ANY(SELECT DISTINCT(category_name) WHERE category_name = '$str')";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
            echo " Category name: ". $row["category_name"] . " Description: ".
            $row["cat_description"] . "<br>";

            $_SESSION['cat'] = $row["category_name"];
            $_SESSION['b'] =$row["cat_description"];

            $c = $_SESSION['cat'];

            echo "<a href= #>$c </a> <br>";?>
              <form method="post">
        <input type="submit" name="button1"
                value="Browse"/>
                <input type="submit" name="button2"
                value="Make a post"/>
         
    </form>
               
<?php
          
     

		
    }else{
		echo "No data found or category already added";
        

	}
}

    if(isset($_POST['button1'])) {
        $str1 =  $_SESSION['ctn'];
        $sql3="SELECT DISTINCT(category_name), providers, cat_description FROM `category` WHERE category_name = '$str1' AND providers <> '' ;
        ";
       
	$res3=mysqli_query($con,$sql3);
	if(mysqli_num_rows($res3)>0){
        echo"<table border='1'>";
        echo"<tr><td><strong>Category name</strong></td><td><strong>Category description</strong></td><td><strong>Provider</strong></td></tr>";
        while ($row1=mysqli_fetch_assoc($res3)){
            $_SESSION['spn'] = $row1['providers'];
            echo "<tr><td>{$row1['category_name']}</td><td>{$row1['cat_description']}</td><td><a href = 'rate.php'>{$row1['providers']}<a></td></tr>";

        }
        echo"</table>";

    }
}

    if(isset($_POST['button2'])) {

        header("Location: post.php");
        
    }


echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";



echo "<p><a href='customer_dashboard.php'>Back to Dashboard</a></p>";
?>

</body>
</html>

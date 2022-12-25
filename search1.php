
<html>
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
	$sql="SELECT * FROM category WHERE category_name = '$str' AND (providers <> '$un' OR providers IS NULL);";
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
              value="Add"/>
              <input type="submit" name="button2"
              value="Browse"/>
         
    </form>
               
<?php
          
     

		
    }else{
		echo "No data found or category already added";
        

	}
}

    if(isset($_POST['button1'])) {
        $a =  $_SESSION['cat'];
        $b = $_SESSION['b'];
        $un = $_SESSION['username'];
        $sql4="INSERT INTO category(category_name,cat_description,providers) VALUES('$a','$b','$un');";
        $res1=mysqli_query($con,$sql4);
    }

    if(isset($_POST['button2'])) {
         $c=$_SESSION['cat'];
       $sql9="SELECT * FROM post WHERE Catergory_name = '$c'" ;
       $res12=mysqli_query($con,$sql9);

       if(mysqli_num_rows($res12)>0){
        echo"<table border='1'>";
        echo"<tr><td><strong>Poster</strong></td><td><strong>Category name</strong></td><td><strong>Category description</strong><td><strong>Date</strong></td></tr>";
        while ($row55=mysqli_fetch_assoc($res12)){
        
            echo "<tr><td>{$row55['Customer_Username']}</td><td>{$row55['Catergory_name']}</td><td>{$row55['Description']}</td><td>{$row55['Post_Date']}</td></tr>";
            echo"</table>";
        }
    }
       

       
    }


echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";



echo "<p><a href='provider_dashboard.php'>Back to Dashboard</a></p>";
?>

</body>
</html>

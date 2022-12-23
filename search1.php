
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
	$sql="SELECT * FROM category WHERE category_name = '$str' AND providers <> '$un' ";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
            echo " Category name: ". $row["category_name"] . " Description: ".
            $row["cat_description"] . "<br>";

            $_SESSION['a'] = $row["category_name"];
            $_SESSION['b'] =$row["cat_description"];

            $c = $_SESSION['a'];

            echo "<a href= #>$c </a> <br>";?>
              <form method="post">
        <input type="submit" name="button1"
                value="ADD"/>
         
    </form>
               
<?php
          
     

		
    }else{
		echo "No data found or category already added";
        

	}
}

    if(isset($_POST['button1'])) {
        $a = $_SESSION['a'];
        $b = $_SESSION['b'];
        $un = $_SESSION['username'];
        $sql4="INSERT INTO category(category_name,cat_description,providers) VALUES('$a','$b','$un');";
        $res1=mysqli_query($con,$sql4);
    }


echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
echo "<p><a href='provider_dashboard.php'>Back to Dashboard</a></p>";
?>

</body>
</html>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css"/>
<head>
	<title>Create a category</title>
</head>

<body>
    
    <form class="form" action="" method="post">
<h2>Create a category</h2>
<input type="text" class="text" name="category_name" placeholder="Category name" required />
<br>
<br>
<br>
<textarea id="txtarea"class="text" name="c_description" placeholder="Description" rows="3" cols="20"></textarea>
<br>
<br>
<input type="submit" name="ADD" value="ADD" class="add-button">
<br>
<h1><a href="provider_dashboard.php">Back to dashboard</a></h1>


</form>
<?php 
   require('db.php');
   session_start();
   //function to check data input
       function test_input($data) {  
           $data = trim($data);  
           $data = stripslashes($data);  
           $data = htmlspecialchars($data);  
           return $data;  
         }  
       // When form submitted, insert values into the database.
       if (isset($_REQUEST['category_name'])) {
           // removes backslashes
          
          
           $category_name    = stripslashes($_REQUEST['category_name']);
           $category_name    = mysqli_real_escape_string($con, $category_name);
           $c_description    = stripslashes($_REQUEST['c_description']);
           $c_description    = mysqli_real_escape_string($con, $c_description);

           $username = $_SESSION['username'];
           $qry   = "INSERT INTO category(category_name, cat_description,providers)
           VALUES('$category_name','$c_description','$username')";
$result   = mysqli_query($con, $qry);
if ($result) {
  echo "<div class='form'>
        <h3>Category successfully added</h3><br/>
        </div>";
} else {
  echo "<div class='form'>
        <h3>Required fields are missing.</h3><br/>
        </div>";
}
?>
       

<?php
       }
       ?>
    </body>
    </html>          






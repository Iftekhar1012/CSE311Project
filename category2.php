<!DOCTYPE html>
<html>
<head>
	<title>Create a category</title>
</head>

<body>
    <h1>hello</h1>
    <form class="form" action="" method="post">
<h2>Create a category</h2>
<input type="text" class="text" name="category_name" placeholder="Category name" required />
<input type="text" class="text" name="c_description" placeholder="Description" >
<br>
<input type="submit" name="ADD" value="ADD" class="add-button">
<br>
<h1><a href="provider_dashboard.php">Back to dashboard</a></h1>


</form>
<?php 
   require('db.php');
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


           $qry   = "INSERT INTO category(category_name, cat_description)
           VALUES('$category_name','$c_description')";
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






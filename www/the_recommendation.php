<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
  

<?php
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);
  if(isset($_POST['submit3'])) { 
    $the_rec=$_POST['the_rec'];
  }
  else{
?>
<h2>Recommendation Writing Page</h2>
  <form method="post" action="the_recommendation.php">
  Please write the recommendation here: <textarea type="text" name="the_rec" cols="80" rows="100"></textarea><br>
  <input type="submit" name="submit3" value="submit">
  </form>
  
  

  


<?php } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Edit Personal Info</h3>

<?php
  $id = $_GET['sid'];

  if(isset($_POST['id'])) {
    $id = $_POST['id'];
  }

  if(isset($_POST['add'])){
    $add = $_POST['add'];
  } else {
    $add = NULL;
  }

  if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
  } else {
    $phone = NULL;

  } if(isset($_POST['email'])){
    $email = $_POST['email'];
  } else {
    $email = NULL;
  }

  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);

  // Retrieve all the data from the "student" table
  $result = mysql_query("SELECT * FROM students WHERE sid='$id'")
    or die(mysql_error());  

  // store the records for the student into $row
  $row = mysql_fetch_array( $result );

  echo '<form method="post" action="edit_info.php">';
    echo '<label for="add">Address:</label>';
    echo '<input type="text" name="add" /><br />';
    echo '<label for="phone">Phone:</label>';
    echo '<input type="text" name="phone" /><br />';
    echo '<label for="email">Email:</label>';
    echo '<input type="text" name="email" /><br />';
    echo '<input type="submit" value="Update" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
  echo '</form>'; 

  echo '<hr>';

  if( $add != NULL ) {
    $update_add_query = "UPDATE students SET address='$add' WHERE sid='$id'";
    mysql_query($update_add_query)
      or die('Error Updating Address');
    echo 'Address successfully updated to '.$add.'<br />';
  }

  if( $phone != NULL ) {
    $update_phone_query = "UPDATE students SET phone='$phone' WHERE sid='$id'";
    mysql_query($update_phone_query)
      or die('Error Updating Phone');
    echo 'Phone successfully updated to '.$phone.'<br />';
  }

  if( $email != NULL ) {
    $update_email_query = "UPDATE students SET email='$email' WHERE sid='$id'";
    mysql_query($update_email_query)
      or die('Error Updating Email');
    echo 'Email successfully updated to '.$email.'<br />';
  }

  mysql_close($dbc);


echo '<br />';
echo '<a href=personal_info.php?sid='.$id.'>Personal Info</a><br />';
echo '<a href=stud_home.php?sid='.$id.'>Home</a>';

?>

</body>
</html>

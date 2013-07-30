<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../../style.css" />
</head>
<body>
  <h3>Add Faculty User</h3>

<?php
  $id = $_GET['fid'];

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

  if(isset($_POST['fid'])){
    $fid = $_POST['fid'];
  } else {
    $fid = NULL;
  }

  if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
  } else {
    $fname = NULL;

  } 

  if(isset($_POST['lname'])){
    $lname = $_POST['lname'];
  } else {
    $lname = NULL;
  }

  if(isset($_POST['permission'])){
    $permission = $_POST['permission'];
  } else {
    $permission = NULL;
  }

  if(isset($_POST['pass'])){
    $pass = $_POST['pass'];
  } else {
    $pass = NULL;
  }

  if(isset($_POST['adding'])){
    $adding = $_POST['adding'];
  } else {
    $adding = NULL;
  }


  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);


  echo '<form method="post" action="add_fac_user.php">';
    echo '<label for="fid">Faculty ID:</label>';
    echo '<input type="text" name="fid" /><br />';
    echo '<label for="pass">Password:</label>';
    echo '<input type="text" name="pass" /><br />';
    echo '<label for="fname">First Name:</label>';
    echo '<input type="text" name="fname" /><br />';
    echo '<label for="lname">Last Name:</label>';
    echo '<input type="text" name="lname" /><br />';
    echo '<label for="add">Address:</label>';
    echo '<input type="text" name="add" /><br />';
    echo '<label for="phone">Phone:</label>';
    echo '<input type="text" name="phone" /><br />';
    echo '<label for="email">Email:</label>';
    echo '<input type="text" name="email" /><br />';
    echo '<label>User Type:</label>';
    echo '<select name="permission">';
    echo '<option value="prof">Professor</option>';
    echo '<option value="gs">Grad Secretary</option>';
    echo '<option value="reviewer">Reviewer</option>';
    echo '<option value="sysadmin">System Administrator</option>';
    echo '</select>';
    echo '</br>';
    echo '<input type="submit" value="Add" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '<input type="hidden" value="true" name="adding" />';
  echo '</form>'; 

  echo '<hr>';

  $idcheck_query = "SELECT * FROM faculty WHERE fid = $fid";
  $idcheck_stud_query = "SELECT * FROM students WHERE sid = $fid";
  
  
  $idresult = mysql_query($idcheck_query);
  $idstudresult = mysql_query($idcheck_stud_query);

  if ( mysql_num_rows($idresult) != 0 || mysql_num_rows($idstudresult) != 0 ) {
    echo 'Error: User with that ID already exists, please pick a different ID';
  } elseif( $add != NULL && $fid != NULL && $fname != NULL
      && $lname != NULL && $phone != NULL 
      && $email != NULL && permission != NULL && $pass != NULL) {

    if( $permission == "prof" ){
      $role = 0;
    } elseif( $permission == "gs" ){
      $role = 1;
    } elseif ( $permission == "reviewer" ){
      $role = 2;
    } else if ( $permission == "sysadmin" ){
      $role = 3;
    }

    $add_query = "INSERT INTO faculty VALUES 
                  ($fid, '$lname', '$fname','$pass',
                  '$add','$phone','$email',$role)";
    mysql_query($add_query)
      or die('Error Adding New Faculty');
    echo 'Successfully added new Faculty member<br />';


  } elseif( $adding == "true") {
    echo 'Sorry you are missing required information';
    echo ', please fill out all fields<br />';
  } else {
    echo '<br />';
  }

  mysql_close($dbc);


echo '<br />';
echo '<a href=sysadmin_home.php?fid='.$id.'>Home</a>';

?>

</body>
</html>

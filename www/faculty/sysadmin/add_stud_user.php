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

  if(isset($_POST['sid'])){
    $sid = $_POST['sid'];
  } else {
    $sid = NULL;
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

  if(isset($_POST['pass'])){
    $pass = $_POST['pass'];
  } else {
    $pass = NULL;
  }

  if(isset($_POST['degree'])){
    $degree = $_POST['degree'];
  } else {
    $degree = NULL;
  }

 if(isset($_POST['admitSem'])){
    $admitSem = $_POST['admitSem'];
  } else {
    $admitSem = NULL;
  }

 if(isset($_POST['admitYear'])){
    $admitYear = $_POST['admitYear'];
  } else {
    $admitYear = NULL;
  }

 if(isset($_POST['adding'])){
    $adding = $_POST['adding'];
  } else {
    $adding = NULL;
  }




  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);


  echo '<form method="post" action="add_stud_user.php">';
    echo '<label for="sid">Student ID:</label>';
    echo '<input type="text" name="sid" /><br />';
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
    echo '<label for="degree">Degree</label>';
    echo '<input type="text" name="degree" /><br />';
    echo '<label>Admit Semester</label>';
    echo '<select name="admitSem">';
    echo '<option value="Fall">Fall</option>';
    echo '<option value="Spring">Spring</option>';
    echo '</select>';
    echo '</br>';
    echo '<label>Admit Year</label>';
    echo '<select name="admitYear">';
    echo '<option value="2008">2008</option>';
    echo '<option value="2009">2009</option>';
    echo '<option value="2010">2010</option>';
    echo '<option value="2011">2011</option>';
    echo '<option value="2012">2012</option>';
    echo '<option value="2013">2013</option>';
    echo '</select>';
    echo '<input type="submit" value="Add" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '<input type="hidden" value="true" name="adding" />';
  echo '</form>'; 

  echo '<hr>';

  $idcheck_query = "SELECT * FROM student WHERE sid = $sid";
  $idcheck_fac_query = "SELECT * FROM faculty WHERE fid = $sid";
  
  $idresult = mysql_query($idcheck_query);
  $idfacresult = mysql_query($idcheck_fac_query);

  if ( mysql_num_rows($idresult) != 0 || mysql_num_rows($idfacresult) != 0) {
    echo 'Error: User with that ID already exists, please pick a different ID';
  } elseif( $add != NULL && $sid != NULL && $fname != NULL
      && $lname != NULL && $phone != NULL 
      && $email != NULL && $pass != NULL
      && $degree != NULL) {

    $add_query = "INSERT INTO students VALUES 
                  ($sid, '$lname', '$fname','$pass',
                  '$add','$phone','$email','$degree','active',
                  '$admitSem','$admitYear')";
    mysql_query($add_query)
      or die('Error Adding New Student');
    echo 'Successfully added new Student member<br />';


  } elseif( $adding == "true" ) {
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

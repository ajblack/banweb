<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Register By CRN</h3>

<?php
  $crn = $_POST['crn'];
  $id = $_POST['id'];

  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');

   mysql_select_db("efletch", $dbc);

  $insert_query = "INSERT INTO takes (sid, crn, grade) " .
             "VALUES ('$id', '$crn', 'IP')";

  $crn_query = "SELECT 1 FROM classes WHERE crn='$crn'";
  $crn_result = mysql_query($crn_query, $dbc)
    or die('Error connecting to classes database');

  $reg_query = "SELECT 1 FROM takes WHERE crn='$crn' AND sid='$id'";
  $reg_result = mysql_query($reg_query, $dbc)
    or die('Error connecting to takes database');


  if(!mysql_fetch_assoc($crn_result)){
    echo 'Registration failed.<br />';
    echo 'Error: Class Does Not Exist.<br />';
    echo '<a href=reg-crn.php?sid='.$id.'>Try Again</a><br />';
  } elseif(mysql_fetch_assoc($reg_result)){
    echo 'Registration failed.<br />';
    echo 'Error: Already registered.<br />';
    echo '<a href=reg-crn.php?sid='.$id.'>Try Again</a><br />';
  } else {
  
    $insert = mysql_query($insert_query)
      or die('Error inserting query into database.');
    echo 'Registration for [ CRN: ' . $crn . ' ] successful.<br />';
  }

  echo '<a href=register.php?sid='.$id.'>Registration Home</a><br />';

  mysql_close($dbc);

?>

</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h3>Login</h3>

<?php
  $id = $_POST['id'];
  $psswd = $_POST['psswd'];

  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);

  $prof_query = "SELECT 1 FROM faculty 
                 WHERE fid = '$id' AND permission = 0
                 AND password = '$psswd'";
  $prof_result = mysql_query($prof_query, $dbc)
     or die('Error querying database.');

  $gs_query = "SELECT 1 FROM faculty 
               WHERE fid = '$id' AND permission = 1
               AND password = '$psswd'";
  $gs_result = mysql_query($gs_query, $dbc)
     or die('Error querying database.');

  $r_query = "SELECT 1 FROM faculty 
               WHERE fid = '$id' AND permission = 2
               AND password = '$psswd'";
  $r_result = mysql_query($r_query, $dbc)
     or die('Error querying database.');

  $sa_query = "SELECT 1 FROM faculty 
               WHERE fid = '$id' AND permission = 3
               AND password = '$psswd'";
  $sa_result = mysql_query($sa_query, $dbc)
     or die('Error querying database.');

  $stud_query = "SELECT 1 FROM students WHERE sid = '$id'
                 AND password = '$psswd'";
  $stud_result = mysql_query($stud_query, $dbc)
     or die('Error querying database.');

  $ga_query = "SELECT 1 FROM graduate_applicant 
               WHERE aid = '$id'
               AND password = '$psswd'";
  $ga_result = mysql_query($ga_query, $dbc)
     or die('Error querying database.');


  mysql_close($dbc);

  if(mysql_fetch_assoc($prof_result)){
    header("Location: faculty/prof/prof_home.php?fid=".$id);
  } elseif(mysql_fetch_assoc($gs_result)) {
    header("Location: faculty/gs_home.php?fid=".$id);
  } elseif(mysql_fetch_assoc($r_result)) {
    header("Location: faculty/reviewer_home.php?fid=".$id);
  } elseif(mysql_fetch_assoc($sa_result)) {
    header("Location: faculty/sysadmin/sysadmin_home.php?fid=".$id);
  } elseif(mysql_fetch_assoc($ga_result)) {
    header("Location: application/applicant_home.php?aid=".$id);
  } elseif(mysql_fetch_assoc($stud_result)) {
    header("Location: students/stud_home.php?sid=".$id);
  } else {
    echo '<h3><font color="#FF2222">';
    echo 'Error: Incorrect Password or ID';
    echo '</font></h3>';
    echo '<a href="login.html">Try Again</a>';
  }

?>

</body>
</html>

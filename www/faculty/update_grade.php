<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Update Grade Confirm</h3>

<?php
  $fid = $_POST['fid'];
  $id = $_POST['id'];
  $grade = $_POST['grade'];
  $crn = $_POST['crn'];

  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');

   mysql_select_db("efletch", $dbc);

  $grade_query = "UPDATE takes SET grade='$grade' WHERE sid='$id' AND crn='$crn'";

  
    $update = mysql_query($grade_query)
      or die('Error Updating Grade');
    echo 'Grade for [ CRN: '.$crn.' ] successfully updated to '.$grade.'<br />';

  echo '<a href=stud_lookup.php?fid='.$fid.'&sid='.$id.'>Back to Student Lookup</a><br />';
  echo '<a href=gs_home.php?fid='.$fid.'>Home</a><br />';

  mysql_close($dbc);

?>

</body>
</html>

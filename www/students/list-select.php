<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Register By Class List</h3>

<?php
  $id = $_GET['sid'];

    //connect to database
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);

  echo '<form method="post" action="reg-list.php">';
  echo 'Select Semester: <select name="semester">';

  $result = mysql_query("SELECT * FROM semesters 
                         ORDER BY semid DESC")
      or die(mysql_error()); 

  $dept_result = mysql_query("SELECT DISTINCT dept 
                              FROM classes ORDER BY dept ASC;")
      or die(mysql_error()); 

  while($row = mysql_fetch_array($result)){
    echo '<option value="' . $row['semid'] . '">'. $row['sem'] . '</option>';
  }
  echo '</select>';

  echo '<br /><br />Select Department: ';
  echo '<select name="dept">';
  echo '<option value="%"> - </option>';
  while($row = mysql_fetch_array($dept_result)){
    echo '<option value="' . $row['dept'] . '">'. $row['dept'] . '</option>';
  }
  echo '</select>';

  echo '<br /><br />Course Number: ';
  echo '<input type="text" name="course_num" />';
  echo '<br /><br />';
  echo '<input type="submit" value="Select" name="submit" />';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '</form>';


?>

</body>
</html>

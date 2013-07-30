<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>New Banweb</title>
</head>
<body>
  <h2>New Banweb</h2>

<?php
  $sid = $_POST['sid'];

  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
   mysql_select_db("efletch", $dbc);

  $firstname_query = "SELECT f_name FROM students WHERE sid = '$sid'";	

  $result = mysql_query($firstname_query, $dbc)
    or die('Error querying database.');

  print_r(mysql_fetch_array($firstname));
 

  mysql_close($dbc);

  echo 'Thanks for submitting the form.<br />';
  echo 'You entered SID = ' . $sid . '<br />';

  while($row = mysql_fetch_assoc($result)){
    echo "First Name: {$row['f_name']}";
	

}

?>

</body>
</html>

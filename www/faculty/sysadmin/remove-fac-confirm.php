<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../../style.css" />
</head>
<body>
  <h3>Remove Faculty User</h3>

<?php
  $rmid = $_POST['rmid'];
  $id = $_POST['id'];

  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');

   mysql_select_db("efletch", $dbc);

foreach( $rmid as $rm ){

  $rm_query = "DELETE FROM faculty WHERE fid='$rm'";

  $exists_query = "SELECT 1 FROM faculty WHERE fid='$rm'";
  $exists_result = mysql_query($exists_query, $dbc)
    or die('Error connecting to faculty database');

  if(!mysql_fetch_assoc($exists_result)){
    echo 'Error: Faculty [ FID : ' . $rm . ' ] Does Not Exist.<br />';

  } else {
  
    $rm_result = mysql_query($rm_query)
      or die('Error removing faculty from database.');
    echo 'Removed Faculty User [ FID: ' . $rm . ' ] successful.<br />';
  }
}

  echo '<br /><hr /><br />';
  echo '<a href=mang_fac_users.php?fid='.$id.'>Manage Faculty Users</a><br />';
  echo '<a href=sysadmin_home.php?fid='.$id.'>Home</a><br />';

  mysql_close($dbc);

?>

</body>
</html>

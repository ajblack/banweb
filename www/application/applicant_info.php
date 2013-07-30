<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Personal Info</h3>

<?php
  $id = $_GET['aid'];

  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);

  // Retrieve all the data from the "student" table
  $result = mysql_query("SELECT * FROM graduate_applicant WHERE aid='$id'")
    or die(mysql_error());  

  // store the records for the student into $row
  $row = mysql_fetch_array( $result );

  // Print out the contents of the entry 
  echo '<table>';
  echo '<tr>';
  echo '<td class="table-col-title">First Name</td>';
  echo '<td>'.$row['f_name'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">First Name</td>';
  echo '<td>'.$row['l_name'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">SSN</td>';
  echo '<td>'.$row['SSN'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">Address</td>';
  echo '<td>'.$row['address'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">Phone</td>';
  echo '<td>'.$row['phone'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">Email</td>';
  echo '<td>'.$row['email'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">Date of Birth</td>';
  echo '<td>'.$row['DOB'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">Race</td>';
  echo '<td>'.$row['race'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">Gender</td>';
  echo '<td>'.$row['gender'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td><a href=edit_appinfo.php?aid='.$id.'>Update Info</a></td>';
  echo '</tr>';
  echo '</table>';
  mysql_close($dbc);


echo '<br />';
echo '<a href=applicant_home.php?aid='.$id.'>Home</a>';

?>

</body>
</html>

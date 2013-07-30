<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../../style.css" />
</head>
<body>
  <h3>Manage Faculty Users</h3>

<?php
  $id = $_GET['fid'];

  if(isset($_POST['id'])){
    $id = $_POST['id'];
  }

  if(isset($_POST['sid'])){
    $sid = $_POST['sid'];
  } else {
    $sid = $_GET['sid'];
  }

  if(isset($_POST['lname'])){
    $lname = $_POST['lname'];
  } else {
    $lname = NULL;
  }

  if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
  } else {
    $fname = NULL;
  }

  if(isset($_POST['showall'])){
    $showall = $_POST['showall'];
  } else {
    $showall = NULL;
  }

    //connect to database
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);

  echo '<table>';
  echo '<tr>';
  echo '<td><form method="post" action="mang_fac_users.php">';  
  echo '<input type="submit" value="Show All Faculty Users" name="submit">';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '<input type="hidden" value="true" name="showall" />';
  echo '</form></td>';
  echo '<td><form method="post" action="add_fac_user.php">';  
  echo '<input type="submit" value="Add Faculty User" name="submit">';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '</form></td>';
  echo '</tr>';
  echo '</table>';

  echo '<hr>';

  echo '<table>';
  echo '<tr>';
  echo '<td>'; 

  echo '<form method="post" action="mang_fac_users.php">';
    echo '<label for="sid">Faculty ID:</label>';
    echo '<input type="text" name="sid" /><br />';
    echo '<input type="submit" value="Enter" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
  echo '</form>';

  echo '</td>';

  echo '<td>'; 

  echo '<form method="post" action="mang_fac_users.php">';
    echo '<label for="lname">Last Name:</label>';
    echo '<input type="text" name="lname" /><br />';
    echo '<input type="submit" value="Enter" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
  echo '</form>';

  echo '</td>';

  echo '<td>'; 

  echo '<form method="post" action="mang_fac_users.php">';
    echo '<label for="fname">First name:</label>';
    echo '<input type="text" name="fname" /><br />';
    echo '<input type="submit" value="Enter" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="sid" />';
  echo '</form>';

  echo '</td>';

  echo '</tr>';
  echo '</table>';

  echo '<hr>';
 

  if( $sid != NULL || $fname != NULL || $lname != NULL || $showall != NULL) {

    if( $sid != NULL ) {
      $query = "SELECT * FROM faculty WHERE fid = $sid";
    } else if( $fname != NULL ) {
      $query = "SELECT * FROM faculty WHERE f_name = '$fname'";
    } else if( $showall == "true" ) {
      $query = "SELECT * FROM faculty";
    } else {
      $query = "SELECT * FROM faculty WHERE l_name = '$lname'";
    }

    $result = mysql_query($query)
     or die('Error querying database.');

    if ( mysql_num_rows($result)==0 ) {
      echo '<br />Error: Faculty Does Not Exist<br />';
    } else {

  

  //print table headers
  echo '<table>';
  echo '<tr>';
  echo '<td class="table-col-title">ID</td>';
  echo '<td class="table-col-title">First Name</td>';
  echo '<td class="table-col-title">Last Name</td>';
  echo '<td class="table-col-title">Address</td>';
  echo '<td class="table-col-title">Phone</td>';
  echo '<td class="table-col-title">Email</td>';
  echo '<td class="table-col-title">Remove?</td>';
  echo '</tr>';
  echo '<form method="post" action="remove-fac-confirm.php">';

  //fill table with class info
  while($row = mysql_fetch_array($result)){
    $rmid = $row['fid'];

    echo '<tr>';
    echo '<td>'.$rmid.'</td>';
    echo '<td>'.$row['f_name'].'</td>';
    echo '<td>'.$row['l_name'].'</td>';
    echo '<td>'.$row['address'].'</td>';
    echo '<td>'.$row['phone'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td><input type="checkbox" name="rmid[]" value="'.$rmid.'"></td>';
    echo '</tr>';

  }

  echo '</table><br />';
  echo '<input type="submit" value="Submit" name="submit">';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '</form>';

  }

}

  echo '<br /><hr /><br />';
  echo '<a href=sysadmin_home.php?fid='.$id.'>Home</a>';

?>

</body>
</html>

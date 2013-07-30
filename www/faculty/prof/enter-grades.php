<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../../style.css" />
</head>
<body>
  <h3>Grades</h3>

<?php

  $id = $_POST['fid'];
  $crn = $_POST['crn'];
  $currentsem = $_POST['currentsem'];

  //connect to database
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);


    $result = mysql_query("SELECT * FROM takes, students, classes
                           WHERE takes.sid = students.sid
                           AND takes.crn = $crn
                           AND takes.crn = classes.crn")
      or die(mysql_error()); 
 
  //make sure students took classes that semester
  if(mysql_num_rows($result) != 0){



  //print table headers
  echo '<table>';
  echo '<tr>';
  echo '<td class="table-col-title">ID</td>';
  echo '<td class="table-col-title">Last Name</td>';
  echo '<td class="table-col-title">First Name</td>';
  echo '<td class="table-col-title">Grades</td>';
  echo '</tr>';

  //fill table with grades
  while($row = mysql_fetch_array($result)){
    $sem = $row['semid']; 
    $sid = $row['sid'];

    echo '<tr>';
    echo '<td>'.$sid.'</td>';
    echo '<td>'.$row['l_name'].'</td>';
    echo '<td>'.$row['f_name'].'</td>';
    echo '<td>';

      echo '<form method="post" action="grades.php">';
      echo '<select name="grade">';
      echo '<option value="">-</option>';
      echo '<option value="A">A</option>';
      echo '<option value="A-">A-</option>';
      echo '<option value="B+">B+</option>';
      echo '<option value="B">B</option>';
      echo '<option value="B-">B-</option>';
      echo '<option value="C+">C+</option>';
      echo '<option value="C">C</option>';
      echo '<option value="C-">C-</option>';
      echo '<option value="D+">D+</option>';
      echo '<option value="D">D</option>';
      echo '<option value="D-">D-</option>';
      echo '<option value="F">F</option>';
      echo '<option value="IP">IP</option>';
      echo '</select>';
      echo '<input type="submit" value="Enter" name="submit" />';
      echo '<input type="hidden" value="' . $sid . '" name="sid" />';
      echo '<input type="hidden" value="'.$id.'" name="fid" />';
      echo '<input type="hidden" value="'.$crn.'" name="crn" />';
      echo '<input type="hidden" value="'.$currentsem.'" name="currentsem" />';
      echo '</form>'; 

    echo '</td>';
    echo '</tr>';
  }
 

  echo '</table><br />';

 }


  echo '<br />';
  echo '<a href=prof_home.php?fid='.$id.'>Home</a>';
  mysql_close($dbc);

?>

</body>
</html>

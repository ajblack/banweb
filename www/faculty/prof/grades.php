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
  $sid = $_POST['sid'];
  $currentsem = $_POST['currentsem'];


  if(isset($_POST['grade'])){
    $grade = $_POST['grade'];
  } else {
    $grade = NULL;
  }

  //connect to database
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);

    if( $grade != NULL ) {

      mysql_query("UPDATE takes SET grade='$grade'
                   WHERE crn='$crn' AND sid='$sid'")
        or die(mysql_error());
    }


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
  echo '<td class="table-col-title">Grade</td>';
  echo '</tr>';

  //fill table with grades
  while($row = mysql_fetch_array($result)){
    $sem = $row['semid']; 

    echo '<tr>';
    echo '<td>'.$row['sid'].'</td>';
    echo '<td>'.$row['l_name'].'</td>';
    echo '<td>'.$row['f_name'].'</td>';
    echo '<td>'.$row['grade'].'</td>';
    echo '</tr>';
  }
 
  if ( $currentsem == $sem ){
    echo '<tr>';
    echo '<td>';
    echo '<form method="post" action="enter-grades.php">';
    echo '<input type="submit" value="Enter Grades" name="submit">';
    echo '<input type="hidden" value="edit" name="state">';
    echo '<input type="hidden" value="'.$crn.'" name="crn">';
    echo '<input type="hidden" value="'.$id.'" name="fid">';
    echo '<input type="hidden" value="'.$currentsem.'" name="currentsem">';
    echo '</form>';
    echo '</td></tr>';
  }

  echo '</table><br />';

 }


  echo '<br />';
  echo '<a href=prof_home.php?fid='.$id.'>Home</a>';
  mysql_close($dbc);

?>

</body>
</html>

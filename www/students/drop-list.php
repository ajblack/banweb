<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Drop From Class List</h3>

<?php

  $id = $_POST['id'];
  $semester = $_POST['semester'];
  $dept = $_POST['dept'];

  if(isset($_POST['course_num'])){
    $course_num = $_POST['course_num']."%";
  } else {
    $course_num = "%";
  }

  //connect to database
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);

  //loop through each class offered in that semester
    $i=$semester;
    $result = mysql_query("SELECT * FROM classes, semesters 
                         WHERE classes.semid = semesters.semid
                         AND semesters.semid ='$i'
                         AND dept LIKE '$dept'
                         AND course_num LIKE '$course_num'")
      or die(mysql_error()); 
 
  //make sure classes exist for that semester
  if(mysql_num_rows($result) != 0){

  $sem_query = mysql_query("SELECT sem FROM semesters WHERE semid='$i'");
  $sem = mysql_fetch_array($sem_query);


  //print table headers
  echo '<table class="transcript">';
  echo '<tr>';
  echo '<td colspan="3" class="table-title">' . $sem['sem'] . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">CRN</td>';
  echo '<td class="table-col-title">Dept</td>';
  echo '<td class="table-col-title">Course Number</td>';
  echo '<td class="title table-col-title">Course Name</td>';
  echo '<td class="table-col-title">Credits</td>';
  echo '<td class="table-col-title">Drop?</td>';
  echo '</tr>';
  echo '<form method="post" action="list-confirm-drop.php">';

  //fill table with class info
  while($row = mysql_fetch_array($result)){
    $crn = $row['crn'];

    echo '<tr>';
    echo '<td>'.$crn.'</td>';
    echo '<td>'.$row['dept'].'</td>';
    echo '<td>'.$row['course_num'].'</td>';
    echo '<td class="title">'.$row['title'].'</td>';
    echo '<td>'.$row['credits'].'</td>';
    echo '<td><input type="checkbox" name="crns[]" value="'.$crn.'"></td>';
    echo '</tr>';
  }
 

  echo '</table><br />';
  echo '<input type="submit" value="Submit" name="submit">';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '</form>';

 }


  echo '<br />';
  echo '<a href=stud_home.php?sid='.$id.'>Home</a>';
  mysql_close($dbc);

?>

</body>
</html>

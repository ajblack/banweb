<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Transcript</h3>

<?php
  $id = $_POST['id'];
  $fid = $_POST['fid'];
  echo 'FID: '.$fid;

  //connect to database
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);

  //find the min and max semester the student has been enrolled in
  $min_max_result = mysql_query("SELECT MIN(semesters.semid), 
                         MAX(semesters.semid) 
                         FROM classes,takes,semesters 
                         WHERE sid='$id' 
                         AND takes.crn = classes.crn 
                         AND classes.semid = semesters.semid")
    or die(mysql_error()); 

  while($row = mysql_fetch_array($min_max_result)){
    $min = $row['MIN(semesters.semid)'];
    $max = $row['MAX(semesters.semid)'];
  }

  $total_credits = 0.0;
  $total_pts = 0.0;
  //loop through each semester and print grades
  for($i=$min; $i<=$max; $i++){
    $result = mysql_query("SELECT * FROM classes,takes,semesters 
                         WHERE sid='$id' 
                         AND takes.crn = classes.crn 
                         AND classes.semid = semesters.semid
                         AND semesters.semid ='$i'")
      or die(mysql_error()); 
 
  //make sure students took classes that semester
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
  echo '<td class="table-col-title">Grade</td>';
  echo '<td class="table-col-title">Credits</td>';
  echo '</tr>';

  $sem_credits = 0.0;
  $sem_pts = 0.0;
  //fill table with grades
  while($row = mysql_fetch_array($result)){

  $credits = $row['credits'];
  $sem_credits = $sem_credits + $credits;

  switch($row['grade']) {
     case 'A': $grade_val = 4.0;
       break;
     case 'A-': $grade_val = 3.7;
       break;
     case 'B+': $grade_val = 3.3;
       break;
     case 'B': $grade_val = 3.0;
       break;
     case 'B-': $grade_val = 2.7;
       break;
     case 'C+': $grade_val = 2.3;
       break;
     case 'C': $grade_val = 2.0;
       break;
     case 'C-': $grade_val = 1.7;
       break;
     case 'D+': $grade_val = 1.3;
       break;
     case 'D': $grade_val = 1.0;
       break;
     case 'D-': $grade_val = 0.7;
       break;
     case 'F': $grade_val = 0.0;
       break;
     default:
       $grade_val=0.0;
  }

  $sem_pts = $sem_pts + ($credits*$grade_val);

    echo '<tr>';
    echo '<td>'.$row['crn'].'</td>';
    echo '<td>'.$row['dept'].'</td>';
    echo '<td>'.$row['course_num'].'</td>';
    echo '<td class="title">'.$row['title'].'</td>';
    echo '<td>';
 
      echo '<form method="post" action="update_grade.php">';
      echo '<select name="grade">';
      echo '<option value="">-</option>';
      echo '<option value="A">A</option>';
      echo '<option value="A-">A-</option>';
      echo '<option value="B">B+</option>';
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
      echo '<input type="hidden" value="' . $id . '" name="id" />';
      echo '<input type="hidden" value="'.$fid.'" name="fid" />';
      echo '<input type="hidden" value="'.$row['crn'].'" name="crn" />';
      echo '</form>';

    echo '</td>';
    echo '<td>'.$credits.'</td>';
    echo '</tr>';
  }
 
  $total_credits = $total_credits + $sem_credits;
  $total_pts = $total_pts + $sem_pts;

  echo '<tr>';
  echo '<td class="buffer"> </td>';
  echo '</tr>'; 
  echo '<tr>';
  echo '<td> </td>';
  echo '<td> </td>';
  echo '<td> </td>';
  echo '<td> </td>';
  echo '<td class="gpa-title">Semester GPA</td>';
  echo '<td class="gpa">' . number_format ( ( $sem_pts/$sem_credits ) , 2 ) .'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td> </td>';
  echo '<td> </td>';
  echo '<td> </td>';
  echo '<td> </td>';
  echo '<td class="gpa-title">Cumulative GPA</td>';
  echo '<td class="gpa">' . number_format ( ( $total_pts/$total_credits) , 2 ) . '</td>';
  echo '</tr>';

  echo '</table><br />';

 }
}

  echo '<br />';
  echo '<a href=gs_home.php?fid='.$fid.'>Home</a>';
  mysql_close($dbc);

?>

</body>
</html>

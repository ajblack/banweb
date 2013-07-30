<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Find Student By ID or Name</h3>

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

    //connect to database
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);


  echo '<table>';
  echo '<tr>';
  echo '<td>'; 

  echo '<form method="post" action="stud_lookup.php">';
    echo '<label for="sid">Student ID:</label>';
    echo '<input type="text" name="sid" /><br />';
    echo '<input type="submit" value="Enter" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
  echo '</form>';

  echo '</td>';

  echo '<td>'; 

  echo '<form method="post" action="stud_lookup.php">';
    echo '<label for="lname">Last Name:</label>';
    echo '<input type="text" name="lname" /><br />';
    echo '<input type="submit" value="Enter" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
  echo '</form>';

  echo '</td>';

  echo '<td>'; 

  echo '<form method="post" action="stud_lookup.php">';
    echo '<label for="fname">First name:</label>';
    echo '<input type="text" name="fname" /><br />';
    echo '<input type="submit" value="Enter" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="sid" />';
  echo '</form>';

  echo '</td>';

  echo '</tr>';
  echo '</table>';

  echo '<hr>';
 

  if( $sid != NULL || $fname != NULL || $lname != NULL) {

    if( $sid != NULL ) {
      $query = "SELECT * FROM students WHERE sid = $sid";
    } else if( $fname != NULL ) {
      $query = "SELECT * FROM students WHERE f_name = '$fname'";
    } else {
      $query = "SELECT * FROM students WHERE l_name = '$lname'";
    }

    $stud_result = mysql_query($query)
     or die('Error querying database.');

    if ( mysql_num_rows($stud_result)==0 ) {
      echo 'Error: Student Does Not Exist';
    } else {
      $row = mysql_fetch_array( $stud_result );
      $real_sid = $row['sid'];
    }

      // Print out the contents of the entry 
      echo '<table>';
      echo '<tr>';
      echo '<td class="table-col-title">Student ID</td>';
      echo '<td>'.$real_sid.'</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class="table-col-title">First Name</td>';
      echo '<td>'.$row['f_name'].'</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class="table-col-title">Last Name</td>';
      echo '<td>'.$row['l_name'].'</td>';
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
      echo '<td class="table-col-title">Degree</td>';
      echo '<td>'.$row['degree'].'</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class="table-col-title">Admit Year</td>';
      echo '<td>'.$row['admit'].'</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td>';

       echo '<form method="post" action="edit_info.php">';
       echo '<input type="submit" value="Update" name="submit" />';
       echo '<input type="hidden" value="'.$real_sid.'" name="id" />';
       echo '<input type="hidden" value="'.$id.'" name="fid" />';
       echo '</form>';

      echo '</td>';
      echo '</tr>';
      echo '</table>';
    }

  echo '<hr>';

   //find the min and max semester the student has been enrolled in
     $min_max_result = mysql_query("SELECT MIN(semesters.semid), 
			    MAX(semesters.semid) 
			    FROM classes,takes,semesters 
			    WHERE sid='$real_sid' 
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
			   WHERE sid='$real_sid' 
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
      echo '<td>'.$row['grade'].'</td>';
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
  
       echo '<form method="post" action="edit_transcript.php">';
       echo '<input type="submit" value="Update" name="submit" />';
       echo '<input type="hidden" value="'.$real_sid.'" name="id" />';
       echo '<input type="hidden" value="'.$id.'" name="fid" />';
       echo '</form>';

  echo '<br />';

  echo '<hr>';

  echo '<br />';
  echo '<a href=gs_home.php?fid='.$id.'>Home</a>';

?>

</body>
</html>

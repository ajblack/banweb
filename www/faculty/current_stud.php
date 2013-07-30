<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Find Current Students</h3>

<?php
  $id = $_GET['fid'];

  if(isset($_POST['id'])){
    $id = $_POST['id'];
  }

  if(isset($_POST['semester'])){
    $selected_sem = $_POST['semester'];
  } else {
    $selected_sem = NULL;
  }

  if(isset($_POST['admit_year'])){
    $selected_admit = $_POST['admit_year'];
  } else {
    $selected_admit = NULL;
  }

  if(isset($_POST['degree'])){
    $selected_degree = $_POST['degree'];
  } else {
    $selected_degree = NULL;
  }
  

    //connect to database
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);


  echo '<table>';
  echo '<tr>';
  echo '<td class="table-col-title">Enrolled in Semester</td>';
  echo '<td class="table-col-title">Admit Year</td>';
  echo '<td class="table-col-title">Degree</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>';

  ////Semester Search

  echo '<form method="post" action="current_stud.php">';
  echo '<select name="semester">';

  $result = mysql_query("SELECT * FROM semesters 
                         ORDER BY semid DESC")
      or die(mysql_error()); 

  while($row = mysql_fetch_array($result)){
    echo '<option value="' . $row['semid'] . '">'. $row['sem'] . '</option>';
  }

  echo '</select>';
  echo '<input type="submit" value="Select" name="submit" />';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '</form>';

  echo '</td>';
 
  ////Admit Year Search
  echo '<td>';

  echo '<form method="post" action="current_stud.php">';
  echo '<select name="admit_year">';

  $result = mysql_query("SELECT DISTINCT admit_year FROM students 
                         ORDER BY admit_year ASC")
      or die(mysql_error()); 

  while($row = mysql_fetch_array($result)){
    echo '<option value="' . $row['admit_year'] . '">'. $row['admit_year'] . '</option>';
  }

  echo '</select>';
  echo '<input type="submit" value="Select" name="submit" />';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '</form>';

  echo '</td>';

  ////Degree Search
  echo '<td>';

  echo '<form method="post" action="current_stud.php">';
  echo '<select name="degree">';

  $result = mysql_query("SELECT DISTINCT degree FROM students 
                         ORDER BY degree ASC")
      or die(mysql_error()); 

  while($row = mysql_fetch_array($result)){
    echo '<option value="' . $row['degree'] . '">'.$row['degree'].'</option>';
  }

  echo '</select>';
  echo '<input type="submit" value="Select" name="submit" />';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '</form>';

  echo '</td>';
  echo '</tr>';
  echo '</table>';

  echo '<br /><hr><br />';

  //Print out Students for Admit Year
  if( $selected_admit != NULL ){
    $admit_query = mysql_query("SELECT sid, l_name, f_name, degree, admit_sem, admit_year
                          FROM students WHERE admit_year=$selected_admit")
        or die(mysql_error());


   //print table headers
  echo '<table class="transcript">';
  echo '<tr>';
  echo '<td colspan="3" class="table-title">Admit Year: '.$selected_admit.'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">SID#</td>';
  echo '<td class="table-col-title">Last Name</td>';
  echo '<td class="table-col-title">First Name</td>';
  echo '<td class="table-col-title">Degree</td>';
  echo '<td class="table-col-title">Admit Semester</td>';
  echo '<td class="table-col-title">Admit Year</td>';
  echo '</tr>';
    
    while($admit_row = mysql_fetch_array($admit_query)){
   
      echo '<tr>';
      echo '<td>'.$admit_row['sid'].'</td>';
      echo '<td>'.$admit_row['l_name'].'</td>';
      echo '<td>'.$admit_row['f_name'].'</td>';
      echo '<td>'.$admit_row['degree'].'</td>';
      echo '<td>'.$admit_row['admit_sem'].'</td>';
      echo '<td>'.$admit_row['admit_year'].'</td>';
      echo '</tr>';

    }

  echo '</table><br />';

  }

    //Print out Students for Given Degree
  if( $selected_degree != NULL ){
    $degree_query = mysql_query("SELECT sid, l_name, f_name, degree, admit_sem, admit_year
                          FROM students WHERE degree='$selected_degree'")
        or die(mysql_error());


   //print table headers
  echo '<table class="transcript">';
  echo '<tr>';
  echo '<td colspan="3" class="table-title">Degree: '.$selected_degree.'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">SID#</td>';
  echo '<td class="table-col-title">Last Name</td>';
  echo '<td class="table-col-title">First Name</td>';
  echo '<td class="table-col-title">Degree</td>';
  echo '<td class="table-col-title">Admit Semester</td>';
  echo '<td class="table-col-title">Admit Year</td>';
  echo '</tr>';
    
    while($degree_row = mysql_fetch_array($degree_query)){
   
      echo '<tr>';
      echo '<td>'.$degree_row['sid'].'</td>';
      echo '<td>'.$degree_row['l_name'].'</td>';
      echo '<td>'.$degree_row['f_name'].'</td>';
      echo '<td>'.$degree_row['degree'].'</td>';
      echo '<td>'.$degree_row['admit_sem'].'</td>';
      echo '<td>'.$degree_row['admit_year'].'</td>';
      echo '</tr>';

    }

  echo '</table><br />';

  }


    //Print out Students for Selected Semester
  if( $selected_sem != NULL ){
    $sem_query = mysql_query("SELECT DISTINCT s.sid, s.l_name, s.f_name, s.degree, s.admit_sem, s.admit_year 
                                 FROM students s, takes t, classes c
                                 WHERE s.sid=t.sid AND t.crn=c.crn
                                 AND c.semid = $selected_sem;")
        or die(mysql_error());

    $sem_name_query = mysql_query("SELECT sem FROM semesters WHERE semid=$selected_sem;")
        or die(mysql_error());

    $sem_name_row = mysql_fetch_array($sem_name_query);      


   //print table headers
  echo '<table class="transcript">';
  echo '<tr>';
  echo '<td colspan="3" class="table-title">Selected Semester: '.$sem_name_row['sem'].'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td class="table-col-title">SID#</td>';
  echo '<td class="table-col-title">Last Name</td>';
  echo '<td class="table-col-title">First Name</td>';
  echo '<td class="table-col-title">Degree</td>';
  echo '<td class="table-col-title">Admit Semester</td>';
  echo '<td class="table-col-title">Admit Year</td>';
  echo '</tr>';
    
    while($sem_row = mysql_fetch_array($sem_query)){
   
      echo '<tr>';
      echo '<td>'.$sem_row['sid'].'</td>';
      echo '<td>'.$sem_row['l_name'].'</td>';
      echo '<td>'.$sem_row['f_name'].'</td>';
      echo '<td>'.$sem_row['degree'].'</td>';
      echo '<td>'.$sem_row['admit_sem'].'</td>';
      echo '<td>'.$sem_row['admit_year'].'</td>';
      echo '</tr>';

    }

  echo '</table><br />';

  }

  echo '<br />';
  echo '<a href=gs_home.php?fid='.$id.'>Home</a>';

?>

</body>
</html>

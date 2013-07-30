<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../../style.css" />
</head>
<body>
  <h3>Class List</h3>

<?php
  $id = $_GET['fid'];

  if(isset($_POST['semester'])){
    $semester = $_POST['semester'];
  } else {
    $semester = NULL;
  }

  if(isset($_POST['id'])){
    $id = $_POST['id'];
  }


    //connect to database
  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
   
  mysql_select_db("efletch", $dbc);

  echo 'Select Semester: <br />';

  echo '<form method="post" action="class-list.php">';
  echo '<select name="semester">';

  $result = mysql_query("SELECT * FROM semesters 
                         ORDER BY semid DESC")
      or die(mysql_error()); 

  $current = "true";
  while($row = mysql_fetch_array($result)){
    if ($current == "true"){
      $currentsem = $row['semid'];
      echo '<option value="' .$currentsem. '">'. $row['sem'] . '</option>';
      $current = "false";
    } else {
      echo '<option value="' . $row['semid'] . '">'.$row['sem'].' (View Only)</option>';
    }
  }

  echo '</select>';
  echo '<input type="submit" value="Select" name="submit" />';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '</form>';

  echo '<br /><hr /><br />';

  if( $semester != NULL ){ 

  $query = "SELECT classes.crn, classes.dept, classes.course_num,
            classes.title FROM teach, classes
            WHERE teach.fid=$id
            AND classes.semid='$semester'
            AND teach.crn = classes.crn";

  $result = mysql_query($query)
    or die('Error querying database.');

  //print table headers
  echo '<table>';
  echo '<tr>';
  echo '<td class="table-col-title">CRN</td>';
  echo '<td class="table-col-title">Dept</td>';
  echo '<td class="table-col-title">Course #</td>';
  echo '<td class="table-col-title">Title</td>';
  echo '<td class="table-col-title">Grades</td>';
  echo '</tr>';

  //fill table with class info
  while( $row = mysql_fetch_array($result)){
    $crn = $row['crn'];

    echo '<form method="post" action="grades.php">';
    echo '<tr>';
    echo '<td>'.$crn.'</td>';
    echo '<td>'.$row['dept'].'</td>';
    echo '<td>'.$row['course_num'].'</td>';
    echo '<td>'.$row['title'].'</td>';
    echo '<td><input type="submit" value="Grades" name="submit">';
    echo '<input type="hidden" value="'.$crn.'" name="crn">';
    echo '<input type="hidden" value="'.$id.'" name="fid"></td>';
    echo '<input type="hidden" value="'.$currentsem.'" name="currentsem"></td>';
    echo '</form>';
    echo '<tr>';
  }

  echo '</table>';
  echo '<br />';

  }

  echo '<hr /><br />';

  echo '<a href="prof_home.php?fid='.$id.'">Home</a>';

  

?>

</body>
</html>

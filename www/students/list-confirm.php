<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Register From Class List</h3>

<?php
  $crns = $_POST['crns'];
  $id = $_POST['id'];
  $semid = $_POST['semid'];

  $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');

   mysql_select_db("efletch", $dbc);

foreach( $crns as $crn ){

  $insert_query = "INSERT INTO takes (sid, crn, grade) " .
             "VALUES ('$id', '$crn', 'IP')";

  $crn_query = "SELECT 1 FROM classes WHERE crn='$crn'";
  $crn_result = mysql_query($crn_query, $dbc)
    or die('Error connecting to classes database');

  $reg_query = "SELECT 1 FROM takes WHERE crn='$crn' AND sid='$id'";
  $reg_result = mysql_query($reg_query, $dbc)
    or die('Error connecting to takes database');

  $taken_query = "SELECT a.crn, b.crn 
                  FROM classes a, classes b, takes where takes.crn = a.crn 
                  AND a.title = b.title AND takes.sid = $id 
                  AND b.crn = $crn AND a.crn != b.crn";
  $taken_result = mysql_query($taken_query, $dbc)
    or die('Error checking if already taken class');

  $taken_num = mysql_num_rows($taken_result);

  $prereq_query = "SELECT DISTINCT a.title, b.title 
                   FROM prereqs p, classes a, classes b 
                   WHERE p.dept=a.dept AND p.course_num=a.course_num 
                   AND p.pdept=b.dept AND p.pcourse_num=b.course_num 
                   AND a.crn=$crn";
  $prereq_result = mysql_query($prereq_query,$dbc);

  $missingPreq = 0;
  while ($preqs = mysql_fetch_assoc($prereq_result)){
    $ptitle = $preqs['title'];
    $req_check_q = " SELECT 1 FROM takes, classes
                     WHERE takes.sid = $id
                     AND takes.crn = classes.crn
                     AND classes.title='$ptitle'
                     AND classes.semid < $semid";
    $req_check_result = mysql_query($req_check_q, $dbc);

    if(mysql_num_rows($req_check_result) == 0){
      echo 'Registration failed.<br />';
      echo 'Missing Pre-Req Course: '.$ptitle.'<br />';
      $missingPreq = 1;
    }
  }



  $day_time_result = mysql_query("SELECT semid, course_day, course_time 
                     FROM classes WHERE crn='$crn'")
    or die('Error getting class time information');

  $day_time_row = mysql_fetch_array($day_time_result);

  $courseDay = $day_time_row['course_day'];
  $courseSem = $day_time_row['semid'];
  $courseTime = $day_time_row['course_time'];


  $day_check_result = mysql_query("SELECT 1 FROM takes t, classes c
                                   WHERE t.crn=c.crn AND t.sid='$id'
                                   AND c.semid='$courseSem'
                                   AND c.course_day='$courseDay'")
     or die('Error checking day conflict');

  $day_conflict = mysql_fetch_assoc($day_check_result);

  $timeconflict = 0;
  if( $day_conflict != NULL ) {

    $time_check_result = mysql_query("SELECT 1 FROM takes t, classes c
                                      WHERE t.crn=c.crn AND t.sid='$id'
                                      AND c.semid='$courseSem'
                                      AND c.course_day='$courseDay'
                                      AND c.course_time='$courseTime'")
        or die('Error checking time conflict');

    $time_conflict_1 = mysql_fetch_assoc($time_check_result);
    if( $time_conflict_1 != NULL ){
      //class at the same time
      $timeconflict = 1;
    } elseif( $courseTime == '4-6:30pm' ) {
      $time_check_result = mysql_query("SELECT 1 FROM takes t, classes c
                                      WHERE t.crn=c.crn AND t.sid='$id'
                                      AND c.semid='$courseSem'
                                      AND c.course_day='$courseDay'
                                      AND c.course_time='3-5:30pm'
                                      OR c.course_time='6-8:30pm'")
        or die('Error checking time conflict');

      $time_conflict_2 = mysql_fetch_assoc($time_check_result);
      if( $time_conflict_2 !=NULL ){
        $timeconflict = 1;
      }
    } elseif( $courseTime == '3-5:30pm' || $courseTime == '6-8:30pm'){
      $time_check_result = mysql_query("SELECT 1 FROM takes t, classes c
                                      WHERE t.crn=c.crn AND t.sid='$id'
                                      AND c.semid='$courseSem'
                                      AND c.course_day='$courseDay'
                                      AND c.course_time='4-6:30pm'")
        or die('Error checking time conflict');

      $time_conflict_3 = mysql_fetch_assoc($time_check_result);
      if( $time_conflict_3 != NULL ){
        $timeconflict = 1;
      }

    }
  }
                        


  if(!mysql_fetch_assoc($crn_result)){
    echo 'Registration failed.<br />';
    echo 'Error: Class [ CRN : ' . $crn . ' ] Does Not Exist.<br />';
  } elseif(mysql_fetch_assoc($reg_result)){
    echo 'Registration failed.<br />';
    echo 'Error: Already registered for class [ CRN : ' . $crn . ' ]<br />';
  } elseif($timeconflict == 1){
    echo 'Registration failed.<br />';
    echo 'Error: Time conflict exists for [ CRN: '.$crn.' ]<br />';
  } elseif($taken_num != 0 ){
    echo 'Registration failed.<br />';
    echo 'Error: Already taken class [CRN: '.$crn.' ]<br />';
  } elseif($missingPreq == 1) {

  } else {
  
    $insert = mysql_query($insert_query)
      or die('Error inserting query into database.');
    echo 'Registration for [ CRN: ' . $crn . ' ] successful.<br />';
  }
}
  echo '<a href=register.php?sid='.$id.'>Registration Home</a><br />';
  echo '<a href=stud_home.php?sid='.$id.'>Home</a><br />';

  mysql_close($dbc);

?>

</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Review</h3>

<?php
  $id = $_GET['fid'];

    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }

    
   if(isset($_POST['aid'])){
          $aid = $_POST['aid'];
    } else {
        $aid = NULL;
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
  
    $dbc = mysql_connect("localhost", "efletch", "s3cr3t201e")
    or die('Error connecting to MySQL server.');
    
    mysql_select_db("efletch", $dbc);
    
    echo '<table>';
    echo '<tr>';
    echo '<td>'; 
    
    echo '<form method="post" action="review_search.php">';
    echo '<label for="aid">Applicant ID:</label>';
    echo '<input type="text" name="aid" /><br />';
    echo '<input type="submit" value="Search" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';
    
    echo '</td>';
    
    echo '<td>'; 
    
    echo '<form method="post" action="review_search.php">';
    echo '<label for="lname">Last Name:</label>';
    echo '<input type="text" name="lname" /><br />';
    echo '<input type="submit" value="Search" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';
    
    echo '</td>';
    
    echo '<td>'; 
    
    echo '<form method="post" action="review_search.php">';
    echo '<label for="fname">First name:</label>';
    echo '<input type="text" name="fname" /><br />';
    echo '<input type="submit" value="Search" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';
    
    echo '</td>';
    
    echo '</tr>';
    echo '</table>';
    
    echo '<hr>';

    if( $aid != NULL || $fname != NULL || $lname != NULL) {
        
        if( $aid != NULL ) {
            $query = "SELECT * FROM graduate_applicant, application  WHERE graduate_applicant.aid=application.aid AND application.aid = $aid";
        } else if( $fname != NULL ) {
            $query = "SELECT * FROM graduate_applicant, application  WHERE graduate_applicant.aid=application.aid AND f_name = '$fname'";
        } else {
            $query = "SELECT * FROM graduate_applicant, application  WHERE graduate_applicant.aid=application.aid AND l_name = '$lname'";
        }

        $stud_result = mysql_query($query)
        or die('Error querying database.'); 
        $stud = mysql_query($query)
        or die('Error querying database.');
        $temp = mysql_fetch_array( $stud_result );
        $taid = $temp['aid'];
       
        if ( mysql_num_rows($stud_result)==0 ) {
            echo 'Error: Student Does Not Exist';
        } else if (mysql_num_rows(mysql_query("SELECT * FROM application WHERE app_status='0' AND aid = '$taid'")) > 0 )  { 
            echo 'Error: Students Application Is Not Complete';
        } else if (mysql_num_rows(mysql_query("SELECT * FROM final_status WHERE decision >= '0' AND aid = '$taid'")) > 0 ) {
            echo 'Error: Decision Already Made'; 
        } else {
            $row = mysql_fetch_array( $stud );
            $real_aid = $row['aid'];
         
     
        // Print out the contents of the entry 
        echo '<table>';
        echo '<tr>';
        echo '<td class="table-col-title">Application ID</td>';
        echo '<td>'.$real_aid.'</td>';
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
        echo '<td class="table-col-title">Degree Sought</td>';
        echo '<td>'.$row['degree_sought'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">Prior Bachelors</td>';
        echo '<td>'.$row['bach_major'].'</td><td>'.$row['bach_gpa'].'</td><td>'.$row['bach_school'].'</td><td>'.$row['bach_year'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">Prior Masters</td>';
        echo '<td>'.$row['mast_major'].'</td><td>'.$row['mast_gpa'].'</td><td>'.$row['mast_school'].'</td><td>'.$row['mast_year'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">GRE Total</td>';
        echo '<td>'.$row['gre_score_total'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">GRE Analytical</td>';
        echo '<td>'.$row['gre_anal'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">GRE Verbal</td>';
        echo '<td>'.$row['gre_score_verbal'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">GRE Quantitative</td>';
        echo '<td>'.$row['gre_quant'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">GRE subject one</td>';
        echo '<td>'.$row['sub1_sub'].'</td><td>'.$row['sub1_score'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">GRE subject two</td>';
        echo '<td>'.$row['sub2_sub'].'</td><td>'.$row['sub2_score'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">GRE subject three</td>';
        echo '<td>'.$row['sub3_sub'].'</td><td>'.$row['sub3_score'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">Work Experience</td>';
        echo '<td>'.$row['work_experience'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">Interest</td>';
        echo '<td>'.$row['interest'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">Admit Semester</td>';
        echo '<td>'.$row['sem_admit'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td class="table-col-title">Admit Year</td>';
        echo '<td>'.$row['year_admit'].'</td>';
        echo '</tr>'; 
        echo '</table>'; 
     

    echo '<hr>';
    
    echo '<form method="post" action="review_search.php">';
    echo '<label>Recommendation:</label><input type="radio" name="rec" value="1">reject <input type ="radio" name="rec" value="2">borderline <input type="radio" name="rec" value="3">admit without aid <input type ="radio" name="rec" value="4">admit with aid<br>';
    echo '<label>Comments:</label> <input type="text" name="comments"></ br>';
    echo '<label>Recommended advisor:</label> <input type="text" name="advisor_recommendation"><br>';
   echo '<input type="submit" name="submit10" value="submit"/>';
    echo '<input type="hidden" value="'.$id.'" name="rawr" />';
    echo '<input type="hidden" value="'.$real_aid.'" name="raid" />';
    echo '</form>'; 
    }
}
   
    if(isset($_POST['submit10'])){
        $rec = $_POST['rec'];
        $com = $_POST['comments'];
        $adv_rec = $_POST['advisor_recommendation'];
        $real_aid = $_POST['raid'];
        $fid = $_POST['rawr'];
        //this query sets the info entered by the reviewer into the database.  
        $query13 = "INSERT INTO review VALUES ('$rec','$com','$fid','$adv_rec','$real_aid')";
        $result = mysql_query($query13)
        or die('Error querying database');
       
        $query_mult = "SELECT avg(recommendation) AS RecAverage FROM review WHERE aid = '$real_aid'";
        $rev = mysql_query($query_mult)
        or die('Error querying database');
        $average=mysql_fetch_array($rev);
        $rec_avg=$average['RecAverage'];
        $query_rec = "UPDATE final_status SET recommendation='$rec_avg' WHERE aid='$real_aid'";
        $result = mysql_query($query_rec)
        or die('Error querying database');
        
        echo "Thank you for your submission";
        echo '<br />';
        echo '<a href=reviewer_home.php?fid='.$fid.'> Home</a>';
    } 
    
 
?>

</body>
</html>

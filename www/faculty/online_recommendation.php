<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
  <h3>Email</h3>

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
    
    echo '<form method="post" action="online_recommendation.php">';
    echo '<label for="aid">Applicant ID:</label>';
    echo '<input type="text" name="aid" /><br />';
    echo '<input type="submit" value="Search" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';
    
    echo '</td>';
    
    echo '<td>'; 
    
    echo '<form method="post" action="online_recommendation.php">';
    echo '<label for="fname">First name:</label>';
    echo '<input type="text" name="fname" /><br />';
    echo '<input type="submit" value="Search" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';
    
    echo '</td>';
    
    
    echo '<td>'; 
    
    echo '<form method="post" action="online_recommendation.php">';
    echo '<label for="lname">Last Name:</label>';
    echo '<input type="text" name="lname" /><br />';
    echo '<input type="submit" value="Search" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';
    
    echo '</td>';
    

    
    echo '</tr>';
    echo '</table>';
    
    echo '<hr>';
    
    if( $aid != NULL || $fname != NULL || $lname != NULL) {
        
        if( $aid != NULL ) {
            $query = "SELECT * FROM graduate_applicant, application, letter_writers  WHERE graduate_applicant.aid=application.aid AND application.aid=letter_writers.aid AND application.aid = $aid";
        } else if( $fname != NULL ) {
            $query = "SELECT * FROM graduate_applicant, application, letter_writers  WHERE graduate_applicant.aid=application.aid AND application.aid=letter_writers.aid AND f_name = '$fname'";
        } else {
            $query = "SELECT * FROM graduate_applicant, application, letter_writers  WHERE graduate_applicant.aid=application.aid AND application.aid=letter_writers.aid AND l_name = '$lname'";
        }
        
        $stud_result = mysql_query($query)
        or die('Error querying database.'); 
        $stud = mysql_query($query)
        or die('Error querying database.');
        $temp = mysql_fetch_array( $stud_result );
        $taid = $temp['aid'];
        
        if ( mysql_num_rows($stud_result)==0 ) {
            echo 'Error: Student Does Not Exist';
        } else if (mysql_num_rows(mysql_query("SELECT * FROM documents WHERE recs_recieved='1' AND aid = '$taid'")) > 0 )  { 
            echo 'Error: Students Recommendations Have Already Been Recieved';
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
            echo '<td class="table-col-title">Recommenders Name</td>';
            echo '<td>'.$row['letter_writer_name'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td class="table-col-title">Recommenders Email</td>';
            echo '<td>'.$row['letter_writer_email'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td class="table-col-title">Recommendation Link</td>';
            echo '<td> http://student.seas.gwu.edu/~efletch/the_recommendation.php?aid='.$real_aid.'</td>';
            echo '</tr>';
            echo '</table>';

     echo '<hr>';
        
        }
    
  /*  
    echo '<form method="post" action="online_recommendation.php">';
    echo '<input type="submit" value="Generate Link" name="gen" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';
        }
    if(isset($_POST['gen'])) { 
    
        echo '<table>';
        echo '<tr>';
        echo '<td class="table-col-title">Application ID</td>';
        
       // echo 'Email this link to'.$row['letter_writer_email'];
        echo '<br>';
        echo '<a href=reviewer_home.php?aid='.$real_aid.'> Recommendation Form</a>';
   
    } */
}       
?>

</body>
</html>

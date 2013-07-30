<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Document Update</h3>

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
    
    echo '<form method="post" action="document_update.php">';
    echo '<label for="aid">Applicant ID:</label>';
    echo '<input type="text" name="aid" /><br />';
    echo '<input type="submit" value="Search" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';
    
    echo '</td>';
    
    echo '<td>'; 
    
    echo '<form method="post" action="document_update.php">';
    echo '<label for="lname">Last Name:</label>';
    echo '<input type="text" name="lname" /><br />';
    echo '<input type="submit" value="Search" name="submit" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';
    
    echo '</td>';
    
    echo '<td>'; 
    
    echo '<form method="post" action="document_update.php">';
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
            $query = "SELECT * FROM graduate_applicant, application,documents  WHERE graduate_applicant.aid=application.aid AND application.aid = $aid AND documents.aid=application.aid";
        } else if( $fname != NULL ) {
            $query = "SELECT * FROM graduate_applicant, application ,documents WHERE graduate_applicant.aid=application.aid AND f_name = '$fname' AND documents.aid=application.aid";
        } else {
            $query = "SELECT * FROM graduate_applicant, application,documents  WHERE graduate_applicant.aid=application.aid AND l_name = '$lname' AND documents.aid=application.aid";
        }

        $stud_result = mysql_query($query)
        or die('Error querying database.'); 
        $stud = mysql_query($query)
        or die('Error querying database.');
        $temp = mysql_fetch_array( $stud_result );
        $taid = $temp['aid'];
       
        if ( mysql_num_rows($stud_result)==0 ) {
            echo 'Error: Student Does Not Exist';
        } else if (mysql_num_rows(mysql_query("SELECT * FROM application WHERE app_status != '0' AND aid = '$taid'")) > 0 )  { 
            echo 'Error: all documents already recieved';
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
        echo '</table>'; 
     

    echo '<hr>';
    
    echo '<form method="post" action="document_update.php">';
    echo '<label>Transcript Recieved?:</label><input type="radio" name="trans" value="0">No <input type ="radio" name="trans" value="1">Yes <br>';
    echo '<label>Letters of Recommendation Recieved?:</label><input type="radio" name="recs" value="0">No <input type ="radio" name="recs" value="1">Yes ><br>';
   echo '<input type="submit" name="submit10" value="submit"/>';
    echo '<input type="hidden" value="'.$id.'" name="rawr" />';
    echo '<input type="hidden" value="'.$real_aid.'" name="raid" />';
    echo '</form>'; 
    }
}
   
    if(isset($_POST['submit10'])){
        //these two below variables will hold the values of the radio buttons that we have created for transcripts and recommendations
        $trans_recieved=$_POST['trans'];
        $recs_recieved=$_POST['recs'];
        $real_aid = $_POST['raid'];
        $fid = $_POST['rawr'];
        //this query sets the info entered by the reviewer into the database.  
        $query14="UPDATE documents SET trans_recieved='$trans_recieved',recs_recieved='$recs_recieved' WHERE aid='$real_aid'";
        $result = mysql_query($query14)
        or die('Error querying database');
        echo "Thank you for your submission";
        echo '<br />';
        echo '<a href=gs_home.php?fid='.$fid.'> Home</a>';
    } 
    
 
?>

</body>
</html>

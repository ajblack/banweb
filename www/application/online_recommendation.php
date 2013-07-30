<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
  

<?php
    $id = $_GET['fid'];
    
    echo '<form method="post" action="online_recommendation.php">';
    echo '<input type="submit" value="Send" name="send" />';
    echo '<input type="hidden" value="'.$id.'" name="id" />';
    echo '</form>';

    if(isset($_POST['send']) { 
    
    $to = "cooolj1120@bellsouth.net";
    $subject = "Test mail";
    $message = "Hello! This is a simple email message.";
    $from = "jhklein@gwmail.gwu.edu";
    $headers = "From: GWU Admissions";
    mail($to,$subject,$message,$headers) or die(sql_error());
    echo "Mail Sent. ID:".$id."<br>";
    }
    
    ?>

</body>
</html>

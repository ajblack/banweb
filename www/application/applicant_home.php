<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Home</h3>

<?php
  $id = $_GET['aid'];
    
  //create links to the pages applicants can access
  echo "<a href=\"status.php?aid=$id\">Check Status</a><br>
        <a href=\"applicant_info.php?aid=$id\">Edit Application Information</a><br>"

 
?>

</body>
</html>

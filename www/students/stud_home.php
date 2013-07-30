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
  $id = $_GET['sid'];

  //create links to the pages students can access
  echo "<a href=\"personal_info.php?sid=$id\">Personal Info</a><br>
        <a href=\"register.php?sid=$id\">Register</a><br>
        <a href=\"transcript.php?sid=$id\">Transcript</a><br>"

?>

</body>
</html>

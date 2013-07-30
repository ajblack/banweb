<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Register</h3>

<?php
  $id = $_GET['sid'];

  echo "<a href=\"reg-drop.php?sid=$id\">Drop By CRN</a><br>
        <a href=\"list-select.php?sid=$id\">Register From Class List</a><br>
        <a href=\"list-select-drop.php?sid=$id\">Drop From Class List</a><br>";

  echo '<br />';
  echo '<a href=stud_home.php?sid='.$id.'>Home</a>';


?>

</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Banweb++</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <h3>Register By CRN</h3>

<?php
  $id = $_GET['sid'];

  echo '<form method="post" action="crn-confirm.php">';
  echo '<label for="crn">CRN:</label>';
  echo '<input type="text" name="crn" /><br />';
  echo '<input type="submit" value="Register" name="submit" />';
  echo '<input type="hidden" value="' . $id . '" name="id" />';
  echo '</form>'


?>

</body>
</html>

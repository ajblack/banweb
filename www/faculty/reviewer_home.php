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
  $id = $_GET['fid'];

  //create links to the pages students can access
  echo "<a href=\"prof_personal_info.php?fid=$id\">Personal Information</a><br>";
  echo "<a href=\"review_search.php?fid=$id\">Search and Review Applicants</a><br>";

?>

</body>
</html>

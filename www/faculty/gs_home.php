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
  echo "<a href=\"personal_info.php?fid=$id\">Personal Information</a><br>
        <a href=\"current_stud.php?fid=$id\">Current Students</a><br>
        <a href=\"stud_lookup.php?fid=$id\">Student Lookup</a><br>
        <a href=\"reg-drop.php?fid=$id\">Force Class Drop</a><br>
        <a href=\"document_update.php?fid=$id\">Update Applicant Documents</a><br>
        <a href=\"final_decision.php?fid=$id\">Update Applicant Decision</a><br>"

?>

</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Banweb++</title><link rel="stylesheet" type="text/css" href="../style.css" /></head><body><h3>Status</h3><?php //good one    //the status page here is presented to the student in the event that they have already submitted their application     $id = $_GET['aid'];     $dbc = mysql_connect("localhost","efletch","s3cr3t201e")     or die('Error connecting to mySQl server');     mysql_select_db("efletch",$dbc);     $sql = "SELECT app_status FROM application WHERE aid = '$id'";     $query = mysql_query($sql);      $statusQuery = mysql_fetch_assoc($query);        if ($statusQuery['app_status'] > 0){      	$sql2 = "SELECT decision FROM final_status WHERE aid='$id'";        $query2 = mysql_query($sql2);        $completeQuery = mysql_fetch_assoc($query2);     	if ($completeQuery['decision'] == 1){//if the final status is set to one then the student has been denied     		echo "Your application for admission has been denied.";     	}     	else if($completeQuery['decision'] == 2 OR $completeQuery['decision'] == 3){     		echo "Congratulations you have been admitted. The formal letter of acceptance will be mailed";            echo '<BR/>';            echo 'To accept or decline your offer of admittence click below';            //checks applicant's decision and then either adds them to students and deltes them from applicant or just deletes            if(isset($_POST['click'])) {                $decision = $_POST['dec'];                if ($decision == 1) {                                    } else {                    $sq = "UPDATE final_status SET stud_decision='$decision' WHERE aid='$id'";                    $result = mysql_query($sq)                    or die('Error querying database');                    echo "Sorry you decided not to continue your studies with us. You shall be missed";                }            }            else {       ?>                <form method="post" action="status.php">                Decision:<input type="radio" name="dec" value="1">Accept <input type ="radio" name="dec" value="0">Decline <br>                <input type="submit" name="click" value="submit"/>                </form>      <?php }     	}     	else{//otherwise, the application is still under review (ie the reviewers havent completed their stuff yet)     		echo "Application Complete and Under Review";     	}     }     else{//is the final status equals 0, then the application is incomplete in that the grad sectretary has not recieved his required documents      	$sql_tran = "SELECT trans_recieved FROM documents WHERE aid = '$id'";//query to see if transcript has been recieved         $query_trans = mysql_query($sql_tran);         $incompleteQueryTrans = mysql_fetch_assoc($query_trans);     	$sql_rec = "SELECT recs_recieved FROM documents WHERE aid = '$id'";//query to see if recommendation has been recieved        $query_rec = mysql_query($sql_rec);         $incompleteQueryRec = mysql_fetch_assoc($query_rec);        echo "You're application is incomplete";        echo "<BR />";     	if($incompleteQueryTrans['trans_recieved']==0){//tells the applicant if the transcript is still missing     		echo "We have not yet recieved your transcript";            echo "<BR />";     	}     	if($incompleteQueryRec['recs_recieved']==0){//tells the applicant if the recommendation is still missing     		echo "We have not yet recieved your recommendations";     	}     }     mysql_close ($dbc); ?>
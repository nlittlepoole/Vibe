<!HTML>
<?php
	  session_start();
	  
	  /*
	    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	    $sql = "SELECT fiveblockAdvocate,Advocate_progress,counterAdvocate,lastdateAdvocate FROM user WHERE UID=" . $_SESSION['userID'];
	    $st = $conn->prepare($sql);
	    $st->execute();
	    $data = $st->fetch();
		*/
	  $currentDatetime = date('Y-m-d');
	  //$datetime1 = new DateTime($data['lastdateAdvocate']);
	  
	  $today = getdate($currentDatetime);
	  
	  $dayCurrent = $today['mday'];
	  $monthCurrent = $today['mon']; 
	  $yearCurrent = $today['year']; 
	  
	  $testStuffTho = $yearCurrent;
	  $testStuffTho2 = $currentDatetime;   
	  
	  echo "<html><body><p>" . $testStuffTho2 . "</p></body></html>"; 
?>

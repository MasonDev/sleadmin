<?php

	include("include/mysql.class.php"); 
	include("include/db.php");
	
	header('Content-Type: application/json');	
	
    sleep(1); 
    $station = $_POST['station'];
    $trainnum = $_POST['train_num'];
	$time = $_POST['time'];
	$dir = $_POST['direction'];
	$day = $_POST['day'];
	$sched_id = $_POST['sched_id'];
	
	if (empty($day)) {
    	$sql = "INSERT INTO sle_trains (sched_id, station, train_num, time, dir) Values ('".$sched_id."','".$station."', '".$trainnum."', '".$time."', '".$dir."')";
	}
	else
	{
		$sql = "INSERT INTO sle_trains (sched_id, station, train_num, time, dir, day) Values ('".$sched_id."','".$station."', '".$trainnum."', '".$time."', '".$dir."','".$day."')";
	}
 
	
	
	
	if (! $db->Query($sql)) {
		echo json_encode(array('errors' => 'database error'));
		$db->Kill();	
	}
	
	echo json_encode(array('id' => $db->GetLastInsertID(),'response'=> '200 OK','name' => $trainnum));
	

?>
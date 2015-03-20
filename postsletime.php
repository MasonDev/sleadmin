<?php

	include("include/mysql.class.php"); 
	include("include/db.php");
	
    sleep(1); 
    $pk = $_POST['pk'];
    $name = $_POST['name'];
    $value = $_POST['value'];
	
	print $name;

    if(!empty($value)) {
		
		switch ($name) {
			case "time":
				$update["time"] = MySQL::SQLValue($value);
				$where["id"] = MySQL::SQLValue($pk);
				$result = $db->UpdateRows("sle_trains", $update, $where);
				break;
			case "day":
				$update["day"] = MySQL::SQLValue($value);
				$where["id"] = MySQL::SQLValue($pk);
				$result = $db->UpdateRows("sle_trains", $update, $where);
				break;
				
			default:
				break;
		}		
				
		
		
		if (! $result) {
			$db->Kill();
		}


        print_r($_POST);
    } else {
        header('HTTP 400 Bad Request', true, 400);
        echo "This field is required!";
    }
?>
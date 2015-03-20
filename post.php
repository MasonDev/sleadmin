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
			case "current":
				$update["current"] = MySQL::SQLValue($value);
				$where["station"] = MySQL::SQLValue($pk);
				$result = $db->UpdateRows("fares", $update, $where);
				break;
			case "future":
				$update["future"] = MySQL::SQLValue($value);
				$where["station"] = MySQL::SQLValue($pk);
				$result = $db->UpdateRows("fares", $update, $where);
				break;
			case "date":
				$update["date"] = MySQL::SQLValue($value);
				$where["id"] = MySQL::SQLValue($pk);
				$result = $db->UpdateRows("farechange", $update, $where);
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
<?php



	include("include/mysql.class.php");
	include("include/db.php"); 
	
	
	function lookup_station($stationid, $db, &$station_name, &$station_lat, &$station_lon) {
	
		if (! $db->Query("SELECT * FROM stations WHERE `id` = " . $stationid . "
			  LIMIT 1")) $db->Kill();
		  while ($station = $db->Row()) {
			  $station_name = $station->station_name;
			  $station_lat = $station->lat;
			  $station_lon = $station->lon;
		  }	
		
	}
	
	
    sleep(1); 
	$train = strip_tags($_POST['train']);
	$type = strip_tags($_POST['type']);
	$direction = strip_tags($_POST['direction']);
	
	$days = false;
	
		
	$query="SELECT distinct train_num FROM " . $train . " WHERE sched_id = " . $type ." and station != 'null' and dir='" . $direction . "' order by train_num";
	
	if ($db->Query($query)) {
		
		echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin: 20px 0;">Add Train</button>';
		
			if ($db->RowCount() > 0) { 
				$array = $db->RecordsArray();
				
				$resultcount = 0;
				
				echo "<table id='schedule' class='table table-bordered'>";
				echo "<thead>";
				echo "<th class='blank'></th>";
				
				foreach ($array as $key => $value) {
					if (isset($value['train_num'])) {
						$train_num =  $value['train_num'];
					}
					echo "<th>" . $train_num . "</th>";
				}
				echo "</thead>";
				
				for($i=9; $i>=1; $i--) {
					lookup_station($i, $db, $name, $station_lat, $lon);
					echo "<tr>";
					echo "<td class='station'>" . $name . "</td>";
					foreach ($array as $key => $value) {
						if (isset($value['train_num'])) {
							$train_num =  $value['train_num'];
						}

						  $query2 = "select id, time, day, station from " . $train . "
						  where train_num = '" . $train_num . "' and station = " . $i . " 
						  and sched_id = " . $type . " and station != 'null' and dir = '" . $direction . "'
						  LIMIT 1";
							 
							if ($db->Query($query2)) {
								$row = $db->Row();
								if (isset($row->day)) $days = true;
								if (isset($row->time)) {
									echo '<td><a href="#" class="time" data-name="time" data-type="text" data-pk="' . $row->id . '" data-url="postsletime.php" data-title="Change time">' . $row->time . '</a>';
									if ($days) echo '<br><a href="#" id="editday" data-pk="' . $row->id . '" data="'. $row->day . '"><i class="fa fa-calendar"></i></a>';
									echo '</td>';
								}
								else
								{
									echo '<td></td>';
								}
							}
							
							$days = false;
							
							
					}
					
					echo "</tr>";
						
				}
				
				
				
				
				echo"</table>";
			}
	} else {
		echo "<p>Query Failed</p>";
	}
	
	echo '<p><i class="fa fa-calendar"></i> - Special Dates</p> ';


	
?>


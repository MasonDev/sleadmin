<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DB Admin</title>
    
    <?php 
	
	include("include/head.php"); 
	
	?>

    
  </head>
  <body>
  
  
  <?php

	if (! $db->Query("SELECT * FROM farechange 
		  LIMIT 1")) $db->Kill();
	  while ($farechange = $db->Row()) {
		  $changedate = $farechange->date;
	  }	
		
  
  ?>
  
	<?php include("include/nav.php"); ?>
  
  	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<h3>Fare Change Date :</h3> <a href="#" class="date" data-name="date" data-type="text" data-pk="1" data-url="post.php" data-title="Change New Fare Date"><?php echo $changedate ?></a>
            </div>	
        </div>
    	<div class="row">
        	<div class="col-sm-12">
            	<h3>New Haven to:</h3>
<?php

	if ($db->Query("SELECT current, future, stations.station_name, fares.station as station  
		FROM fares
		INNER JOIN stations
		ON fares.station = stations.id")) {
    	echo "<table id='fares' class='table'>";
		echo "<thead><th>Station</th><th>Current</th><th>Future</th></thead>"; 
		while ($row = $db->Row()) {
			echo '<tr><td>' . $row->station_name . '</td><td><a href="#" class="current" data-name="current" data-type="text" data-pk="' . $row->station . '" data-url="post.php" data-title="Change Current Fare">' . $row->current . '</a></td><td><a href="#" class="future" data-name="future" data-type="text" data-pk="' . $row->station . '" data-url="post.php" data-title="Change Future Fare">' . $row->future . '</a></td></tr>';
		}
		echo "<table>"; 

	} else {
		echo "<p>Query Failed</p>";
	}

?>            
            </div>
        </div>
    </div> 
<?php include("include/foot.php"); ?>
  </body>
</html>
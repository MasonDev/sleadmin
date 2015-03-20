<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DB Admin</title>

    <?php include("include/head.php"); ?>
    
  </head>
  <body>
  
	<?php include("include/nav.php"); ?>
  
  	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="col-sm-4">
                    <select class="form-control" id="type">
                        <option value="">Time of Week</option>
                        <option value="215">Weekday</option>
                        <option value="214">Weekend/Holiday</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" id="direction">
                        <option value="">Direction</option>
                        <option value="e">East</option>
                        <option value="w">West</option>
                    </select>                
                </div>
                <div class="col-sm-4">
                    <input type="hidden" id="train" value="sle_trains" />
                	<button type="button" class="btn btn-danger" id="find_schedule">Edit</button>
                </div>
            </div>
        </div>
    </div> 
    <div class="container-fluid">
    	<div class="row" style="margin-top: 30px;">
        	<div class="col-sm-12" id="results">
            
            </div>        	
        </div>
    </div>

<?php include("include/foot.php"); ?>
  </body>
</html>
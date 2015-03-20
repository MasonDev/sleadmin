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
                	<button type="button" class="btn btn-danger" id="find_sle_schedule">Go</button>
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
    
<!-- add train -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Train</h4>
          </div>
          <div class="modal-body">
            <div id="msg" class="alert hide"></div>
                <table id="user" class="table table-bordered table-striped">
                    <tbody> 
                        <tr>         
                            <td width="40%">Station</td>
                            <td><a href="#" class="myeditable" id="station" data-type="select" data-name="station" data-original-title="Enter Station Number"></a></td>
                        </tr>
                        <tr>         
                            <td>Train Number</td>
                            <td><a href="#" class="myeditable" id="train_num" data-type="text" data-name="train_num" data-original-title="Enter Train Number"></a></td>
                        </tr>  
                        <tr>         
                            <td>Time</td>
                            <td><a href="#" class="myeditable" id="time" data-type="text" data-name="time" data-original-title="Enter Time"></a></td>
                        </tr>     
                        <tr>         
                            <td>Direction</td>
                            <td><a href="#" class="myeditable" id="dir" data-type="text" data-name="direction"  data-original-title="Enter Direction"></a></td>
                        </tr>  
                        <tr>         
                            <td>Special Days</td>
                            <td><a href="#" class="myeditable" id="day" data-type="text" data-name="day" data-original-title="Enter Special Days"></a></td>
                        </tr>
                        <tr style="visibility: hidden;">         
                            <td>Schedule</td>
                            <td><a href="#" class="myeditable" id="sched_type" data-type="text" data-name="sched_id" data-original-title="schedule ID" value=""></a></td>
                        </tr>                  
                    </tbody>
                </table>
            <div>
            <button id="save-btn" class="btn btn-primary">Save</button>
            <button id="close-btn" type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:none;">Close</button>
            </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
</div>

<!-- change day -->
<div class="modal fade" id="changeday" tabindex="-1" role="dialog" aria-labelledby="myChangeDay" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Train</h4>
          </div>
          <div class="modal-body">
            <div id="msg" class="alert hide"></div>
                <table id="user" class="table table-bordered table-striped">
                    <tbody> 
                        <tr>         
                            <td width="40%">Day</td>
                            <td><a href="#" class="time" id="dayedit" data-url="sle_changeday.php" data-type="text" data-name="day" data-pk="" data-original-title="change day"></a></td>
                        </tr>
                    </tbody>
                </table>
            <div>
            <button id="save-btn" class="btn btn-primary">Save</button>
            <button id="close-btn" type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:none;">Close</button>
            </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
</div>


<?php include("include/foot.php"); ?>
  </body>
</html>
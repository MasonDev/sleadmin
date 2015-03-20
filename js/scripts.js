// JavaScript Document

$(document).ready(function() {
	
	
	$('#myModal').on('hidden.bs.modal', function (e) {
		  $('.myeditable').editable('setValue', null)  
			.editable('option', 'pk', null)          
			.removeClass('editable-unsaved');        
                   
		$('#save-btn').show();
		$('#msg').hide();     
	})	
	
    $('.current, .future, .date, .time, .day').editable();
	
	$('#find_sle_schedule').click(function(e) {
		$train = $('#train').val();
        $type = $('#type').val();
		$direction = $('#direction').val();
		$('#sched_type').attr('value',$type);
		
            post_data = {'train':$train, 'type':$type, 'direction':$direction};
			
			

			jQuery.ajax({
				type: "POST",
				url: '/dbadmin/get_sle_schedule.php',
				data: post_data,
				success: function(data) {            
					$('#results').html(data);
					$('a#editday').click(function(e) {
						day_data = $(this).attr('data');
						day_pk = $(this).attr('data-pk');
						$('a#dayedit').html(day_data);
						$('a#dayedit').attr('data-pk',day_pk);
						$('#changeday').editable({
						  selector: 'a'
						});												
						$('#changeday').modal({show: true});
					});
					},
				fail: function (err){
					console.log(err);
					}
				});            
		
		
    });
	
	$('#train_num, #time, #dir, #day').editable({
		url: '/post' 
	});
	
	$('#station').editable({
        value: 1,
		url: '/post',    
        source: [
              {value: 1, text: 'New London'},
              {value: 2, text: 'Old Saybrook'},
              {value: 3, text: 'Westbrook'},
			  {value: 4, text: 'Clinton'},
			  {value: 5, text: 'Madison'},
			  {value: 6, text: 'Guilford'},
			  {value: 7, text: 'Branford'},
			  {value: 8, text: 'New Haven State Street'},
			  {value: 9, text: 'New Haven Union Station'}
           ]
    });
		
	 
	 
	$('.myeditable').on('save.newuser', function(){
		var that = this;
		setTimeout(function() {
			$(that).closest('tr').next().find('.myeditable').editable('show');
		}, 200);
	});
	
	$('#station, #train_num, #time, #dir').editable('option', 'validate', function(v) {
		if(!v) return 'Required field!';
	});		
	
	$('#save-btn').click(function() {
	   $('.myeditable').editable('submit', { 
		   url: '/dbadmin/addsletrain.php', 
		   data: {'sched_id':$('#sched_type').attr('value')},
		   ajaxOptions: {
			   dataType: 'json'
		   },           
		   success: function(data, config) {
			   if(data && data.id) {  
				   $(this).editable('option', 'pk', data.id);
				   $(this).removeClass('editable-unsaved');
				   var msg = data.name;
				   $('#msg').addClass('alert-success').removeClass('alert-error').html(msg).show();
				   $('#save-btn').hide();
				   $('#close-btn').show(); 
				   $(this).off('save.newuser');                     
			   } else if(data && data.errors){ 
				   console.log(data.errors);
			   }               
		   },
		   error: function(errors) {
			   var msg = '';
			   if(errors && errors.responseText) { //ajax error, errors = xhr object
				   msg = errors.responseText;
			   } else { //validation error (client-side or server-side)
				   $.each(errors, function(k, v) { msg += k+": "+v+"<br>"; });
			   } 
			   $('#msg').removeClass('alert-success').addClass('alert-error').html(msg).show();
		   }
	   });
	});	
});

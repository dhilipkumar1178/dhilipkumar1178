<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add Event</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
	<body>
      </div>
      <div class="main row">
        <div class="col-sm-12 col-md-4">
          <!-- <form id="book-form" > -->
            <div class="form-group">
			<form class="form-horizontal" id="frm" method="POST" name = "form1" action="">
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" >
						<select class="form-control" name="insurance" id="insurance" onchange="calcVals()">
							<option disabled="" selected=""></option>
							<option value="200">Yes</option>
							<option value="0">No </option>
						</select>
			<label> Event Name</label>
						<select name="event_name" id="event_name" class="form-control input-lg">
					<option value="">Select Event</option>
				<?php foreach($events as $event) {?>
					<option value="<?=$event->event_id?>"><?=$event->event_name?></option>
				<?php } ?>
   </select>
			</div>
			<div class="form-group">
              <label for="">Time Slot </label>
							<select type="text" name="time_slot" id="time_slot" onchange="calcVals()" class="form-control">
    					<option value="">Select Time Slot</option>
							
            </div>
						<label for="author">Start Date</label>
            <div class="form-group">
              <label for="author">Start Date</label>
              <input type="date" name="start_date" id="" class="form-control">
            </div>
			<div class="form-group">
              <label for="author">End Date</label>
              <input type="date" name="end_date" id="" class="form-control">
            </div>

						<div class="form-group">
              <label for="">Amount </label>
							<select type="text" name="amount" id="amount" onchange="calcVals()" class="form-control">
    					<option value="">Select Amount</option>
            </div>
					
			<div class="form-group">
				
              <label for="isbn">Gst </label>
              <input type="text" name="gst" id="gst" class="form-control" value="10" readonly>
            </div>
			<div class="form-group">
              <label for="isbn">Total </label>
              <input type="text" name="total" id="total" class="form-control" readonly>
            </div>
       <!-- <input type="submit" value="Add Event" class="btn btn-danger btn-block edit-btn" > -->
            <input type="submit" value="Submit" id="sub" class="btn btn-success btn-block add-btn">
          </form>
        </div>
		<div class="modal fade" id="basiceModal" tabindex="-1" aria-labelledby="basicModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="basicModalLabel">Heading of Modal Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="paraa" class="modal-body">
               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>   
                        
                     </div>
                </div>
            </div>
        </div>       

<script>
 function calcVals() {
  var e = document.getElementById("amount");
	var f = document.getElementById("insurance");

  var selFrst = e.options[e.selectedIndex].value;
  var selScnd = f.options[f.selectedIndex].value;
	
  var totalCal = +selFrst + +selScnd;
  document.getElementById("total").value = totalCal;

}

	$(document).ready(function(){
      
      $( "#sub" ).on( "click", function() {
       
          $.ajax({
              url:'<?php echo base_url('User/addevent_management');?>',
              type:"POST",
              data:$("#frm").serialize(),
              dataType:"json",
              success:function(reg)
              {
                if(reg.STATUS=='TRUE')
                {
                  $('#paraa').html(reg.message);
                        $('#basiceModal').modal('show');
                        $('#basiceModal').on('hidden.bs.modal',function(){
                      window.location='<?php echo base_url('User/event_view');?>';
                    });
                   
                }
              }
                  // else{
                  //   var htmls='';
                  //   $.each(reg.message,function(k,v)
                  //   {
                  //     htmls+=v+'</br>';
                  //   });
                    
                  // }
                    
                  
    
           });     
          return false;
      });
    });
		$(document).ready(function(){
		$("#event_name").change(function(){
			var event_id = $(this).val();
			if(event_id!=""){
				$.ajax({
					url:"<?=base_url('user/times')?>",
					method:"get",
					data:{event_id:event_id},
					success:function(data){
						$("#time_slot").html(data);
						$("#amount").html(' <option value="">Select Slot</option>');
					}
				});
			}else{
				$("#time_slot").html('  <option value="">Select Time</option>');
				$('#amount').html(' <option value="">Select Slot</option>');
			}
		});
	});


	$("#time_slot").change(function(){
			var time_id = $(this).val();
			if(time_id!=""){
				$.ajax({
					url:"<?=base_url('user/Amounts')?>",
					method:"get",
					data:{time_id:time_id},
					success:function(data){
						$("#amount").html(data);
					}
				});
			}else{
				$('#amount').html(' <option value="">Select Amount</option>');
			}
	});

	
</script>
	
</body>
</html>

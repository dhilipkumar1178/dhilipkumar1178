<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Event Add</title>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
</style>
<body>
<nav class="navbar navbar-light ">
  <h5> Add Event</h5>
  <form class="form-inline">

  
    <button class="btn btn-outline-warning my-2 my-sm-0"><i class="fa fa-plus"></i>Add Event</button>
    <button class="btn btn-outline-danger my-2 my-sm-0 "><i class="fa fa-close">Reset</i></button>
    

  </form>
</nav>

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
   
            <form class="form-horizontal" id="frm" method="POST" name = "form1" action="">
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" >
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label> Event Name</label><span style="font-size:150%;color:red;">*</span>
									<select name="event_name" id="event_name" class="form-control input-lg">
										<option value="">Select Event</option>
									<?php foreach($events as $event) {?>
										<option value="<?=$event->event_id?>"><?=$event->event_name?></option>
									<?php } ?>
						</select>
                  </div>
                </div>
                        <div class="col-md-6 mb-4 d-flex align-items-center">
                          <div class="form-outline datepicker w-100">
                          <label>Start Date</label><span style="font-size:150%;color:red;">*</span><input type="date" name="start_date" id="" class="form-control">
                          </div>
                        </div>

												<div class="col-md-6 mb-4 d-flex align-items-center">
                          <div class="form-outline datepicker w-100">
                          <label>End Date</label><span style="font-size:150%;color:red;">*</span><input type="date" name="end_date" id="" class="form-control">
											
                          </div>
                        </div>
												<div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label> Select Time Slot</label><span style="font-size:150%;color:red;">*</span>
									<select type="text" name="time_slot" id="time_slot" onchange="calcVals()" class="form-control">
    							</select>
                  </div>
                    </div>
                    <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label>Amount</label><span style="font-size:150%;color:red;">*</span>
										<select type="text" name="amount" id="amount" onchange="calcVals()" class="form-control">
										<option value="">Select Amount</option>
										</select>
                  </div>
                    </div>

                    <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label>Gst</label><span style="font-size:150%;color:red;">*</span> <input type="text" name="gst" id="gst" class="form-control" value="10" readonly>
                  </div>
                    </div>

                    <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label>Total</label><span style="font-size:150%;color:red;">*</span><input type="text" name="total" id="total" class="form-control" readonly>
                  </div>
                  </div>

       
      <br></br>
      <br></br>
      <div class="col-sm-8 form-group mb-0 my-2 ">
          <input type="submit" value="Submit" id="sub" class="btn btn-success btn-block add-btn">
    
        </div>
    </div>
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
</section>
<script>
  function calcVals() {
  var amount = document.getElementById("amount");
	var gstValue = document.getElementById("gst").value;

  var selectedAmount = parseInt(amount.options[amount.selectedIndex].value);
	var gstAmount = (selectedAmount/100)*gstValue;
	var totalAmount = selectedAmount+gstAmount;

	document.getElementById("total").value = totalAmount;
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

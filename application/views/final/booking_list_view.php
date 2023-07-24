<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Payslip View</title>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<h4>Payslip View And Edit </h4>
     <a style="float:right"class="btn btn-outline-warning my-2 my-sm-0 " href="<?=base_url('Exstu/create')?>"><i class="fa fa-plus"></i>Add</a>
     <a style="float:right" class="btn btn-outline-danger my-2 my-sm-0 " href="<?=base_url('Welcome/index')?>"><i class="fa fa-close"></i>Reset</a>
     <table id="a" class="table table-bordered container-fluid">
     <thead>
        <tr>
            <th>S. No</th>
            <th>First Name</th>
            <th>Booking Hall Name</th>
            <th>Booking Date</th>
            <th>Time Slot</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>    
</body>
</html> 
<?php
$sno=1;
  foreach ($bookings as $booking) {
?>
	<tr>
		<td><?=$sno++?></td>
		<td><?=$booking['name']?></td>
		<td><?=$booking['hall_name']?></td>
		<td><?=$booking['date']?></td>
		<td><?=$booking['time_slot']?></td>         
		<td>

		<a  class='btn btn-danger' onclick="deletes('<?php echo $booking['id']; ?>')" href='javascript:void(0)'>Delete</a>

	</td>
	</tr>
	<?php
  }
    ?>
    </tbody>
</table>
<div class="modal fade" id="basiceModal" tabindex="-1" aria-labelledby="basicModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="basicModalLabel">Heading of Modal Here</h5>
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

function deletes(id){
        var data={
            id:id,   
        };
    
            $.ajax({
                url:'<?php echo base_url('Registration/deletes');?>',
                type:'post',
                data:data,
                dataType:"json",
                success:function(ress){
                    console.log(ress);
                    if(ress.STATUS=='TRUE'){
    
                    $('#paraa').html(ress.message);
                    $('#basiceModal').modal('show'); 
                    $('#basiceModal').on('hidden.bs.modal',function(){
                    
                        location.reload();
                    });
                      
                    }
                    else{
                        var htmls='';
                        $.each(ress.message,function(k,v)
                        {
                            htmls+=v+'</br>';
                        });
                    }
                },
            });
        
    
}

</script>



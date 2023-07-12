<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User List</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

    </head>
    <body>
		<div class="container">
			<div class="row">
				<div class="col">
					<h1>User List</h1>
					<table id="book-table" class="table table-bordered table-striped table-hover">
			<thead>
              <tr>
				<th>S.No</th>
				<th>Event Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Time</th>
				<th>Amount</th>
				<th>Gst</th>
				<th>Total</th>
				<th>Action</th>

              </tr>
            </thead>
<?php
$sno=1;
  foreach ($event as $man) {
?>
		<tr>
		<td><?=$sno++?></td>
		<td><?=$man['event_name']?></td>
		<td><?=$man['start_date']?></td>
		<td><?=$man['end_date']?></td>
		<td><?=$man['time_slot']?></td>
		<td><?=$man['amount']?></td>
		<td><?=$man['gst']?></td>
		<td><?=$man['total']?></td>
						
		<td>
          <a class='btn btn-primary' href='<?=base_url('Registration/payslip_edit/'.$man['id'])?>'>Edit</a>
          <a  class='btn btn-danger' onclick="deletes('<?php echo $man['id']; ?>')" href='javascript:void(0)'>Delete</a>
		  <a class='btn btn-primary' href='<?=base_url('user/add_event/'.$man['id'])?>'>Add</a>

        </td>
        </tr>
        <?php
  }
    ?>
		</thead>
		<tbody>
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
	</div>
</div>
</div>
    </body>
</html>
<script>
	$(document).ready(function(){
		$('#book-table').DataTable({
			"pageLength":5,
			"ajax":{
				url:"<?=site_url('user/index')?>",
				type:"GET"
			},
			"processing":true,
			"serverSide":true,
			"columns":[
				null,
				null,
				null,
				null,
				null,
			]
			,
			"order":[
				[1,"asc"]
			]
		});

	});

	function deletes(id){
        var data={
            id:id,   
        };
    
            $.ajax({
                url:'<?php echo base_url('user/deletes');?>',
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



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_signup</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  
</head>
<body>
<div><?php echo validation_errors() ?></div>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

            <form class="form-horizontal" id="frm" method="POST" action="">
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" >
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
									<label class="form-label" >Name<span style="font-size:150%;color:red;">*</span></label>
                    <input type="text" id="" class="form-control form-control-lg" name="name" required/>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
									<label class="form-label" >Password<span style="font-size:150%;color:red;">*</span></label>
                  </div>
                    <input type="text" id="" class="form-control form-control-lg" name="password" required >
              <div class="mt-4 pt-2">
                <input class="btn btn-primary" type="submit" value="submit" id="sub" name="submit">
                <a href="<?=base_url('Registration/login_index')?>"></a>    
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
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

    $(document).ready(function(){

      $( "#sub" ).on( "click", function() {
        // alert('x');
   
          $.ajax({
              url:'<?php echo base_url('Registration/admin_submit');?>',
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
                      window.location='<?php echo base_url('Registration/login_index');?>';
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
      })
                
    });
    


</script>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Admin_Login</title>
</head>
<style>
    #parr{
        background-color: #d5f4e6;
        height:50px;
    }
</style>
<body>
  
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap v5.2 Design Login Forms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center ">
        <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white">
            <h2 class="text-center mb-4 text-primary">Admin Login Form</h2>
            
            <form class="form-horizontal" id="frm" method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
            <div id="parr" >
               <!-- <p id="par"></p> -->
               <div id="par" class="alert  alert-info alert-dismissable"><i class="fa fa-ban">Username or password mismatched</div>            

            </div>
            </div>
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" />
        <input type="hidden" class="form-control" id="" name="id" >
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <input type="text" class="form-control border border-primary" id="" aria-describedby="emailHelp" name="name" required >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control border border-primary" id="password" name="password" required>
                </div>
                
                <div class="d-grid">
                    <input class="btn btn-primary" id="login" name="submit" type="submit">
                    <!-- <a href="<?=base_url('Registration/dashboard_index')?>"></a> -->
                </div>
            </form>
            <div class="mt-3">
                <p class="mb-0  text-center">Don't have an account? <a href="<?=base_url('Registration/admin_index')?>" class="text-primary fw-bold">Sign Up</a></p>
                
            </div>
        </div>
    </div>
    

<script>
$('#parr').hide('');
$(document).ready(function(){

  $( "#login" ).on( "click", function() {
    // alert('The User Name and password field is required.');

      $.ajax({
          url:'<?php echo base_url('Registration/admin_login');?>',
          type:"POST",
          data:$("#frm").serialize(),
          dataType:"json",
          success:function(html)
          {
            // console.log(html);
            if(html.status==1){
                 window.location='<?php echo base_url('Registration/admin_dashboard');?>';
                  // alert('x'); 
            }
            else if(html.status==0){
                $('#parr').show('');
                    $('#par').html(status.message);
                    setTimeout(function(){
                        jQuery('#parr').fadeOut();
                        location.reload();
                    }, 5000);
                    // alert('x');
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
      
</body>
</html>

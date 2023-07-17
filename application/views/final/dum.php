
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</head>
<body>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Barlow&display=swap');

body{
  font-family: 'Barlow', sans-serif;
}

a:hover{
  text-decoration: none;
}

.border-left{
  border-left: 2px solid var(--primary) !important;
}


.sidebar{
  top: 0;
  left : 0;
  z-index : 100;
  overflow-y: auto;
}

.overlay{
  background-color: rgb(0 0 0 / 45%);
  z-index: 99;
}

/* sidebar for small screens */
@media screen and (max-width: 767px){
  
  .sidebar{
    max-width: 18rem;
    transform : translateX(-100%);
    transition : transform 0.4s ease-out;
  }
  
  .sidebar.active{
    transform : translateX(0);
  }
  
}
</style>

  <!-- main content -->
  <main class="p-4 min-vh-100">
    <section class="row">
      <div class="col-md-6 col-lg-4">
        <!-- card -->
        <article class="p-4 rounded shadow-sm border-left
       mb-4">
          <a href="<?=base_url('Registration/login_index')?>" class="d-flex align-items-center btn btn-info">
            <span class="bi bi-box h5"></span>
            <h5 class="ml-2">User</h5>
          </a>
        </article>
      </div>
      <div class="col-md-6 col-lg-4">
        <article class="p-4 rounded shadow-sm border-left mb-4">
          <a href="<?=base_url('Registration/admin_login_index')?>" class="d-flex align-items-center btn btn-primary ">
            <span class="bi bi-person h5"></span>
            <h5 class="ml-2">Admin</h5>
          </a>
        </article>
      </div>
    </section>

<script>
	$(document).ready(()=>{
  
  $('#open-sidebar').click(()=>{
     
      // add class active on #sidebar
      $('#sidebar').addClass('active');
      
      // show sidebar overlay
      $('#sidebar-overlay').removeClass('d-none');
    
   });
  
  
   $('#sidebar-overlay').click(function(){
     
      // add class active on #sidebar
      $('#sidebar').removeClass('active');
      
      // show sidebar overlay
      $(this).addClass('d-none');
    
   });
  
});
</script>
</body>
</html>



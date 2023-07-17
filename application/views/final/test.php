<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</head>
<body>
	<div class="container">
		<h1 align="center">Hall Seminar Hall</h1>
		
		<hr>
		<?php echo form_open('test');?>
		 
		  <div class="form-group mx-sm-3 mb-2">
		    <label for="inputPassword2" class="sr-only">search product</label>
		    <input type="text" class="form-control" id="inputPassword2" name="key" placeholder="search"> &nbsp;
		    <input type="submit" class="form-control btn btn-success" id="inputPassword2" value="search" name="submit" >
		  </div>
		  
		<?php echo form_close();?>
	</div>
	<?php foreach ($store as $key ) {?>
	<div class="container" align="center">
				
		<div class="card  text-center" style="width: 18rem; height:auto; display: block; " >
		  <img src="<?php echo base_url()?>uploads/<?=$key->image?>" class="card-img-top" alt="...">
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $key->name?></h5>
		    <p class="card-text"><?php echo $key->description?></p>
		    <a href="<?=base_url('Registration/add_event')?>"  class="btn btn-primary">Book Now</a>
		  </div>
		
	</div>
	</div>
	<?php } ?>


</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Event Category</title>
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
            <h2 class="text-center mb-4 text-primary">Event Category </h2>
            
            <form class="form-horizontal" id="frm" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" />
        <input type="hidden" class="form-control" id="" name="id" >
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category</label>
                    <select name="category_name" id="category_name" class="form-control input-lg">
						<option value="">Select Category</option>
					<?php foreach($Categorys as $Category) {?>
						<option value="<?=$Category->id?>"><?=$Category->category_name?></option>
					<?php } ?>
					</select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <textarea type="textarea" class="form-control border border-primary" id="decription" name="decription" required></textarea>
                </div>
                
                <div class="d-grid">
                    <input class="btn btn-primary" id="cat" name="submit" type="submit">
                    <a href="<?=base_url('user/add_event')?>"></a>
                </div>
            </form>
    
                
            </div>
        </div>
    </div>
    
</body>
</html>

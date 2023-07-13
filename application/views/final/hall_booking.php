<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Booking</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</head>
<body>
<style>


.main {
    width: 25%;
    margin: 80px auto;
}



.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}



body {
  height: 100%;
  margin: 0;
  background-color:black;
  font-family: 'Open Sans', sans-serif;
  /* background-color: #f6f9fc; */
  
}

.center {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.center-vertically {
    display: flex;
    justify-content: center;
}

.align-right: {
  text-align: right;
}

.widget-container {
    height: 100vh;
}

.widget-container .card {
  width: 512px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.04), 0 2px 4px rgba(0,0,0,0.06);
}

.widget-container .card .card-top .main-image {
  width: 90%;
  margin-left:-30px;
  margin-top: -30px;
  border-radius: 8px;
  border-bottom-right-radius: 0px;
}

.widget-container .card .card-top .likes {
  position: absolute;
  color: #fff;
  font-size: 0.75rem;
  top: -15px;
  right: 100px;
}

.widget-container .card .card-top .card-sidenav {
  position: absolute;
  right:0;
  top:0;
  color: #fff;
  background-color: #4a5e7f;
  border-top-right-radius: 10px;
  width:81px;
  height:228px;
  padding-top: 15px;
}

.btn-next, .btn-previous {
  width: 100%;
  height:60px;
  font-size:0.9rem;
  cursor: pointer;
}

.widget-container .card .card-top .card-sidenav .score {
  position: absolute;
  bottom:0;
  width: 100%;
  height:82px;
  background-color: #6886b7;
  font-size:1.2rem;
}

.widget-container .card .card-description {
  width: 100%;
  padding:30px 15px;
}

.widget-container .card .row {
  margin-right: 0 !important;
  margin-left: 0 !important;
}

.widget-container .card .card-description .hotel-name {
  display: flex;
  font-size: 1rem;
  font-weight: 600;
  text-transform: uppercase;
}

.widget-container .card .card-description .hotel-name .stars {
  font-size: 0.5rem;
  color: #FFB300;
  margin-left: 8px;
  margin-top: 5px;
  padding:0;
}

.widget-container .card .card-description .hotel-name .stars i {
  padding:0;
}

.widget-container .card .card-description .hotel-location {
  font-size: 0.75rem;
  margin-top:5px;
  text-transform: uppercase;
  color: #bbb;
}

.widget-container .card .card-description .book-button {
  font-size: 0.75rem;
  font-weight: 600;
  background-color: #6886b7;
  color: #fff;
  border-radius: 5px;
  border: none;
  padding: 3px 40px;
}
</style>
<div class="main">
  <div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" class="form-control" placeholder="Search">
  </div>
  
<div class="widget-container center">
  <div class="card">
    <div class="card-top">
      <img  class="main-image" src="https://www.pro-voyages.com/storage/app/uploads/public/5b4/dd8/036/5b4dd80365bad827588706.jpg">
      <span class="likes">
        </img>
      </span>
      <div class="card-sidenav">
        <div class="btn-next center">
        </div>
      </div>
    </div>
    <div class="card-description row">
      <div class="col-md-7">
        <div class="hotel-name">
        </div>
        <div class="hotel-location">
			<p style="font-size:100%;color:brown;">Seminar Hall</p>
        </div>
      </div>
      <div class="col-md-5 center-vertically">
		<a class='btn btn-danger' href="<?=base_url('Registration/admin_index')?>" class="text-primary fw-bold">BOOK NOW</a>
      </div>
    </div>
	
  </div>
</div>

</body>
</html>

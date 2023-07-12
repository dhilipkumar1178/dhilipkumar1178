<!-- <h3>You Logged In </h3>
<a href="<?=base_url('user/change_password')?>">Change Password</a>&nbsp;
<a href="<?=base_url('user/logout')?>">Logout</a> -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background-color: #252525;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    margin: 30px;
    font-family: Arial, Helvetica, sans-serif;
    margin: 100px;
    text-align: center;



}
.form{
 
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin: 50px 0px 0px 700px;
    border-radius: 30px;
    width: 400px;
    height: 500px;
    background: #1488cc;
    background: -webkit-linear-gradient(180deg, #1488cc 0%, #2b32b2 100%);
    background: linear-gradient(180deg, #1488cc 0%, #2b32b2 100%);
}
.form:hover{
    animation: anime1 2s linear;
    animation-fill-mode: forwards;
    animation-delay: 0.5s;
}
@keyframes anime1{
    0%,50%,100%{
        transform: rotateZ(0deg);
    }
    25%{
        transform: rotateZ(20deg);
    }
    75%{
        transform: rotateZ(-20deg);
    }
}
.title{
    
    margin-top: -80px;
    font-family: 'source sans 3',sans-serif;
    font-size: 40px;
    color: white;
    text-shadow: 0 0 50px white, 0 0 100px springgreen;
}
.nameinput{
    background-color: transparent;
    border: 2px solid transparent;
    font-family: 'source sans 3',sans-serif;
    width: 200px;
}
.name::before{
    content:'';
    position: absolute;
    width: 0;
    height: 0;
    border: 1px solid white;
    border-radius: 30px;
    background-color: white;
    box-shadow: 0 0 40px 10px deepskyblue, 0 0 50px 20px lightskyblue;
    margin-top: 10px;
    animation: anime 1s linear;
    animation-fill-mode: forwards;
}
@keyframes anime{
    0%{
        width: 0;
    }
    100%{
        width: 200px;
    }
}
.passwordinput{
    background-color: transparent;
    border: 2px solid transparent;
    font-family: 'source sans 3',sans-serif;
    width: 200px;
}
.password::before{
    content:'';
    position: absolute;
    width: 0;
    height: 0;
    border: 1px solid white;
    border-radius: 30px;
    background-color: white;
    box-shadow: 0 0 40px 10px deepskyblue, 0 0 50px 20px lightskyblue;
    margin-top: 20px;
    animation: anime 1s linear;
    animation-fill-mode: forwards;
}
.submit{
    width: 100px;
    height: 30px;
    font-size: 20px;
    font-family: 'source sans 3',sans-serif;
    border-radius: 30px;
    border: 3px solid transparent;
    background-color: transparent;
    color: white;
}
.submit:hover{
    border: 3px solid white;
    box-shadow: 0 0 40px 20px deepskyblue, inset 0 50px 30px springgreen;
}
p{
    text-align: center;
}


.navigation {
  width: 100%;
 
}

img {
  width: 40px;
  border-radius: 10px;
  float: left;
}

.logout {
  font-size: .4em;
  font-family: 'Oswald', sans-serif;
position: relative;
  right: -14px;
  bottom: -2px;
  overflow: hidden;
  letter-spacing: 3px;
  opacity: 0;
  transition: opacity .45s;
  -webkit-transition: opacity .35s;
  
}

.button {
	text-decoration: none;
    float: right;
  margin: 120px 10px 20px 20px;
  color: black;
  width: 30px;
  /* background-color: black; */
  transition: width .35s;
  -webkit-transition: width .35s;
  overflow: hidden
}

a:hover {
  width: 150px;
}

a:hover .logout{
  opacity: .9;
}





</style>
<body>
<head>
        <title>Login form effect</title> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,800;1,600&display=swap" 
        rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> <link rel="stylesheet" href="style.css">
</svg>
</head>
<body>

    <nav style='background-color: white' class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <br></br>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url().('user/add_event')?>">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Event Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?=base_url().('user/add_event')?>">Book Event Crud</a></li>
            <li><a class="dropdown-item" href="<?=base_url().('user/add_cat')?>">Event Category Crud</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Holiday Crud</a></li>
          </ul>
        </li>
      </ul>
    <div>
    <a class="button" href="<?=base_url().('user/login')?>">
    <i class='fas fa-sign-out-alt' style='font-size:30px;color:white '>logout</i>
	
	</a>
    </div>
    </div>
  </div>
</nav>
   
   </body>
</body>
</html>

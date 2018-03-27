<?php   
 session_start();  
 if (isset($_SESSION['userSession'])!="") {
 header("Location: index.php");
}
require_once 'db_connect.php';
?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
    <title><?=$pagetitle?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>     
    <script src="js/jquery.bootgrid.js"></script>  
    <script src="js/popper.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.js"></script>
    <script src="js/jquery.uploadify.min.js"></script>
    <script src="js/jquery.datetimepicker.full.min.js"></script>
    <script src="js/lightgallery.js" type="text/javascript"></script>
    <script src="js/picturefill.min.js" type="text/javascript"></script>
    <script src="js/jquery.mousewheel.min.js" type="text/javascript"></script>
    <script src="js/date.js" type="text/javascript"></script>
    <script src="js/jquery-bootstrap-modal-steps.min.js" type="text/javascript"></script>
     
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" >
    <link href="css/uploadify.css" rel="stylesheet"  >
    <link href="css/jquery.bootgrid.css" rel="stylesheet" >
    <link  href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet" >
    <link href="css/jquery.datetimepicker.css" rel="stylesheet" >
    <style>
#logo {
height: 130%;
margin-top: -3px;
margin-right: 5px;
}       

p {                
font-size: 14px;           
}

h3 {
margin: 10px 0 30px 0;
letter-spacing: 10px;      
font-size: 30px;
color: #111;
}
.carousel-inner img {
width: 80%; /* Set width to 100% */      
margin: auto;
}

.carousel-caption h3 {
color: #fff !important;
}
@media (max-width: 600px) {
    .carousel-caption {
    display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    } 
}
* {
    box-sizing: border-box;
}

body {
    background-color: #f1f1f1;
    padding: 20px;
    font-family: Arial;
}

/* Center website */
.main {
    max-width: 1000px;
    margin: auto;
}

h1 {
    font-size: 50px;
    word-break: break-all;
}

.row {
    margin: 10px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
    padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Content */
.content {
    background-color: white;
    padding: 10px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}




.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
   
</style>
         
</head> 
<body> 

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/fyp/index.php">
        <span><img id="logo" src="/fyp/image/logo_2.png" alt="" class="d-inline-block align-top"> Photo Partner</span>
      
    </a>

    <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>  
    </div>
  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      
      <ul class="nav navbar-nav">
        <li>  <a href="/fyp/service.php">Serivce</a></li>
        <?php if(isset($_SESSION['username'])) {?>
          <li><a href="/fyp/myjob.php">My Job</a></li>
        <li><a href="/fyp/myevent.php">My Event</a></li>
          <?php } ?>
        <?php if(isset($_SESSION['username']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 5) ){?>
        <li><a href="/fyp/mygallery.php">My Gallery</a></li>
        <?php  } ?>
        <li><a href="/fyp/about_us.php">About us</a></li>
        <li><a href="/fyp/contact_us.php">Contact us</a></li>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 3) {?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Management</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/fyp/usermanagement.php">User Management</a></li>
                <li><a class="dropdown-item" href="/fyp/eventmanagement.php">Event Management</a></li>
              </ul>
          </li>
        <?php  } ?>
      </ul>

      <div class="btn-group navbar-btn navbar-right">
        <?php
         if(isset($_SESSION['username'])){
        ?>  
        <a class="btn btn-primary" href="myinfo.php" ><?php echo $_SESSION['username']; ?></a>
        <a class="btn btn-default" href="#" id="logout">Logout</a>
              
        <?php  
         }else{  
        ?>              
        <button type="button" class="btn btn-default" name="SignUp_button" id="SignUp_button"  data-toggle="modal" data-target="#SignUp"><span class="glyphicon glyphicon-user"></span>  Sign Up</button>
        <button type="button" class="btn btn-default" name="login_button" id="login_button"  data-toggle="modal" data-target="#Ulogin"><span class="glyphicon glyphicon-log-in"></span> Login</button>
      </div>
              
        <button class="btn btn-primary navbar-btn navbar-right" name="business_side" id="business_side">Become Our Partner</button>
        <?php  
         }  
        ?>
    </div>
  </div>

</nav>

  <div id="Ulogin" class="modal fade" role="dialog" style="margin-top:50px">   
      <div class="modal-dialog" >  
     <!-- Modal content-->  
         <div class="modal-content">  
          <div class="modal-header">  
            <h4 class="modal-title">Login</h4>  
             <button type="button" class="close" data-dismiss="modal">&times;</button>               
          </div>  
          <div class="modal-body">  
             <label>Username</label>  
             <input type="text" name="username" id="username" class="form-control" />  
             <br />  
             <label>Password</label>  
             <input type="password" name="password" id="password" class="form-control" />  
             <br />  
             <button type="button" name="userlogin" id="userlogin" class="btn btn-primary">Login</button>  
          </div>  
         </div>  
      </div>  
   </div> 
    
<div id="Gallery" class="modal fade" role="dialog"> 
</div>
    
    


  <div id="SignUp" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
     <!-- Modal content-->  
         <div class="modal-content">  
          <div class="modal-header">  
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Signup</h4>  
            
            <div class='alert alert-success  success-create-account'>
              <span class='glyphicon glyphicon-info-sign'></span> Account successfully registered !
            </div>
            <div class='alert alert-danger  fail-email-duplicate'>
              <span class='glyphicon glyphicon-info-sign'></span> Email has already been registered !
            </div>
            <div class='alert alert-danger  fail-username-duplicate'>
              <span class='glyphicon glyphicon-info-sign'></span> Username has already been used !
            </div>
          </div>  
          <div class="signin-form">
             <div class="modal-body">
                 <form class="form-signin" method="post" id="register-form">
                <?php
                  if (isset($msg)) {
                   echo $msg;
                  }
                ?>
                <div class="form-group">
                  <input type="text" class="form-control username" placeholder="Username" name="S_user" required  />
                </div>
                <div class="form-group">
                  <input type="email" class="form-control email" placeholder="Email address" name="S_email" required  />
                  <span id="check-e"></span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control password" placeholder="Password" name="S_pass" required  />
                </div>          
                <hr />
                
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="btn-signup" id='signup'>
                  <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
                  </button>
                </div> 
                

                </form>
            </div>
          </div>
         </div>  
      </div>  
   </div> 
   <?=$pagemaincontent?>

  <!-- END MAIN -->
  </div>
  <footer class="container-fluid bg-light text-center" >
    @2018 Photor Partner. All right reserved
  </footer>
  </body>  
</html> 



  
<script>
// Login
$('.alert').hide();
$(document).ready(function(){  
  $('#business_side').click(function(){  
    window.location="business_side.php"      
  });  
  $('#signup').click(function(e) {
      var username = $('.username').val(); 
      var email = $('.email').val();  
      var password = $('.password').val();  
      e.preventDefault();
      if(username != '' && password != '' && email != '')  
      {  
          $.ajax({  
               url:"signup.php",  
               method:"POST",  
               data: {username:username, password:password, email: email},  
               success:function(data)  
               {  
                $('.alert').hide();
                    if(data == 1)  
                    {  
                        $('.success-create-account').show();
                    }  
                    else  
                    {  
                        if(data == 2) {
                          $('.fail-username-duplicate').show();
                        } else if(data == 3) {
                          $('.fail-email-duplicate').show();
                        } else {
                          alert("System error");
                        }
                    }  
               }  
          });  
      }  
      else  
      {  
          alert("Missing username / password");  
      }  
  });

      //Photo login
    $('#userlogin').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val();  
           if(username != '' && password != '')  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     data: {username:username, password:password, role : 1},  
                     success:function(data)  
                     {   
                          if(data == 0)  
                          {  
                               alert("Wrong username / password, please try again!");  
                          }  
                          else  
                          {  
                               alert("Sign in successfully!"); 
                               $('#loginModal').hide();  
                               location.href= 'index.php';  
                          }  
                     }  
                });  
           }  
           else  
           {  
                alert("Missing username / password");  
           }  
      });  
     
    //logout
      $('#logout').click(function(){  
           var action = "logout";  
           $.ajax({  
                url:"action.php",  
                method:"POST",  
                data:{action:action},  
                success:function()  
                {  
                     alert("Sign out successfully"); 
                     location.href= 'index.php';  
                }  
           });  
      });

 });  

</script>
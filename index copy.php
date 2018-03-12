<?php   
 session_start();  
 if (isset($_SESSION['userSession'])!="") {
 header("Location: index.php");
}
require_once 'db_connect.php';

if(isset($_POST['btn-signup'])) {
 
 $uname = strip_tags($_POST['S_user']);
 $email = strip_tags($_POST['S_email']);
 $upass = strip_tags($_POST['S_pass']);
 
 $uname = $DBcon->real_escape_string($uname);
 $email = $DBcon->real_escape_string($email);
 $upass = $DBcon->real_escape_string($upass);
 
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $DBcon->query("SELECT email FROM user WHERE email='$email'");
 $count=$check_email->num_rows;
 
 if ($count==0) {
  
  $query = "INSERT INTO user(username,email,password) VALUES('$uname','$email','$upass')";

  if ($DBcon->query($query)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
  }
  
 } else {
  
  
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
    </div>";
   
 }
 
 $DBcon->close();
}

 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
    <title>Webslesson Tutorial | Make Login Form by Using Bootstrap Modal with PHP Ajax Jquery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <!--  <script  type="text/javascript" src="../js/UserSignUp.js"></script> -->

   

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
            width: 65%; /* Set width to 100% */      
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
        <li><a href="/fyp/about_us.php"">About us</a></li>
        <li><a href="/fyp/contact_us.php">Contact us</a></li>
        <li><a href="/fyp/event.php"">Job List</a></li>
      </ul>

      <div class="btn-group navbar-btn navbar-right">
        <?php
         if(isset($_SESSION['username'])){
        ?>  
               
        <a class="btn btn-primary" href="#" >Welcome - <?php echo $_SESSION['username']; ?></a>
        <a class="btn btn-default" href="#" id="logout">Logout</a>
              
        <?php  
         }else{  
        ?>              
        <button type="button" class="btn btn-default" name="SignUp_button" id="SignUp_button"  data-toggle="modal" data-target="#SignUp"><span class="glyphicon glyphicon-user"></span>  Sign Up</button>
        <button type="button" class="btn btn-default" name="login_button" id="login_button"  data-toggle="modal" data-target="#Ulogin"><span class="glyphicon glyphicon-log-in"></span> Login</button>
      </div>
              
        <button class="btn btn-primary navbar-btn navbar-right" name="business_side" id="business_side">Business User</button>
        <?php  
         }  
        ?>
    </div>
  </div>

</nav>

	<div id="Ulogin" class="modal fade" role="dialog">  
		  <div class="modal-dialog">  
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


  <div id="SignUp" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
     <!-- Modal content-->  
         <div class="modal-content">  
          <div class="modal-header">  
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Signup</h4>  
                           
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
                  <input type="text" class="form-control" placeholder="Username" name="S_user" required  />
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email address" name="S_email" required  />
                  <span id="check-e"></span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="S_pass" required  />
                </div>          
                <hr />
                
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="btn-signup">
                  <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
                  </button>
                </div> 
                

                </form>
            </div>
          </div>
         </div>  
      </div>  
   </div> 

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:50px">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="/fyp/image/weddingmainpic.jpg" height="700">
        <div class="carousel-caption">
          <h3>Wedding</h3>
          <p>Make memories with your Lover</p>
        </div>      
      </div>

      <div class="item">
        <img src="/fyp/image/hkmainpic.jpg"  height="700">
        <div class="carousel-caption">
          <h3>Hong Kong</h3>
          <p> The Pearl of East- A night we won't forget</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="/fyp/image/familymainpic.jpg"  >
        <div class="carousel-caption">
          <h3>Family</h3>
          <p>Have a good time with your family</p>
        </div>      
      </div>

      <div class="item">
        <img src="/fyp/image/modelmainpic.jpg" alt="Chicago"  height="700">
        <div class="carousel-caption">
          <h3>Hong Kong</h3>
          <p> The Pearl of East- A night we won't forget</p>
        </div>      
      </div>


    </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

   


<div id="band" class="container text-center">
  <h3>Photography</h3>
  <p><em>Easy to start up your event</em></p>


  <button type="button" id="start_event" name="start_event" class="btn btn-danger center-block">Start Event</button>
  <p> </p>

  <p>We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  <br>
  

</div>
	 
  <footer class="container-fluid bg-light text-center" >
    <a>@2018 Photor Partner. All right reserved</a>
  </footer>
  </body>  
</html> 



  <script>  
 $(document).ready(function(){  
  $('#business_side').click(function(){  
    window.location="business_side.php"      
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
                     data: {username:username, password:password},  
                     success:function(data)  
                     {  
                          //alert(data);  
                          if(data == 'No')  
                          {  
                               alert("Wrong Data");  
                          }  
                          else  
                          {  
                               $('#loginModal').hide();  
                               location.reload();  
                          }  
                     }  
                });  
           }  
           else  
           {  
                alert("Both Fields are required");  
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
                     location.reload();  
                }  
           });  
      });

 });  
 </script>  
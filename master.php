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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>  
<!--    <link href="card.css" rel="stylesheet" type="text/css">-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <!--  <script  type="text/javascript" src="../js/UserSignUp.js"></script> -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://imagesloaded.desandro.com/imagesloaded.pkgd.js"></script>
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/uploadify.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>  
   
<script src="https://cdn.jsdelivr.net/g/lightgallery@1.3.5,lg-fullscreen@1.0.1,lg-hash@1.0.1,lg-pager@1.0.1,lg-share@1.0.1,lg-thumbnail@1.0.1,lg-video@1.0.1,lg-autoplay@1.0.1,lg-zoom@1.0.3" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js" type="text/javascript"></script>
        
     <script src="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/datejs/date.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css">
     <script src="js/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/jquery.datetimepicker.css">
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

        <style>
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
        <li><a href="/fyp/myevent.php">My Events</a></li>
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
    
<div id="charge" class="modal fade" role="dialog" style="margin-top:50px">   
      <div class="modal-dialog" >  
     <!-- Modal content-->  
         <div class="modal-content">  
          <div class="modal-header">  
            <h4 class="modal-title">Upgrade to Premium</h4>  
             <button type="button" class="close" data-dismiss="modal">&times;</button>               
          </div>  
          <div class="modal-body">  
             <label>Code</label>  
             <input type="text" name="code" id="code" class="form-control" />  
             <br />  
             <button type="button" name="submit" id="submit" class="btn btn-primary">Submit</button>  
          </div>  
         </div>  
      </div>  
   </div> 
    
<div id="SignUpForBiz" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
     <!-- Modal content-->  
         <div class="modal-content">  
          <div class="modal-header">  
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Signup for Business User</h4>  
            
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
                 <form class="form-signin" method="post" id="register-form-biz">
                <?php
                  if (isset($msg)) {
                   echo $msg;
                  }
                ?>
                <div class="form-group role">
                  <label for="">User Type</label>
                  <input type="hidden" class="form-control biz_role" value="" name="biz_role" required  />
                  <span style="color:red"></span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control biz_username" placeholder="Username" name="biz_username" required  />
                </div>
                <div class="form-group">
                  <input type="email" class="form-control biz_email" placeholder="Email address" name="biz_email" required  />
                  <span id="check-e"></span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control biz_password" placeholder="Password" name="biz_password" required  />
                </div>    
                <div class="form-group">
                  <input type="text" class="form-control biz_contact" placeholder="Contact Number" name="biz_contact" required  />
                </div>   
                <div class="form-group">
                  <input type="text" class="form-control biz_description" placeholder="Descript yourself" name="biz_description" required  />
                </div>           
                <div class="form-group">
                  <label for="biz_budget" class="control-label">Budget</label>
                  <select name="biz_budget">
                    <option value="1">$0 - $1000</option>
                    <option value="2">$1001 - $5000</option>
                    <option value="3">$5001 - $10000</option>
                    <option value="4">$10000+</option>
                  </select>
                </div>            
                <div class="form-group">                  
                  <label for="biz_specialist">Speciality</label>
                  <select name="biz_specialist">
                    <option value="1">Photographer</option>
                    <option value="2">MakeupArtist</option>
                    <option value="3">Fashion Shop</option>
                    <option value="4">Model</option>
                    <option value="5">Venue</option>
                  </select>
                </div>            
                <div class="form-group">          
                  <label for="">Working Experience</label>
                  <select name="biz_workingexp">
                    <option value="1">0 - 2 Years</option>
                    <option value="2">3 - 5 Years</option>
                    <option value="3">6 - 10 Years</option>
                    <option value="4">10 Years+</option>
                  </select>
                </div>  
                <hr />
                <div id="area">      
                  <label for="">Payment Information</label>
                  <div class="master-card">
                    <div class="card">
                      <div class="title">CREDIT CARD</div>
                      <div class="input-number"><span class="title-number">CARD NUMBER</span>
                        <div class="inputs-number">
                          <input type="text" maxlength="4" name="number-card" placeholder="0000" required="required"/>
                          <input type="text" maxlength="4" name="number-card" placeholder="0000" required="required"/>
                          <input type="text" maxlength="4" name="number-card" placeholder="0000" required="required"/>
                          <input type="text" maxlength="4" name="number-card" placeholder="0000" required="required"/>
                        </div>
                        <div class="selects-date selecters">
                          <div class="day-select"><span>DAY</span>
                            <select id="dates">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4</option>
                              <option value="">5</option>
                              <option value="">6</option>
                              <option value="">7</option>
                              <option value="">8</option>
                              <option value="">9</option>
                              <option value="">10</option>
                              <option value="">11</option>
                              <option value="">12</option>
                              <option value="">13</option>
                              <option value="">14</option>
                              <option value="">15</option>
                              <option value="">16</option>
                              <option value="">17</option>
                              <option value="">18</option>
                              <option value="">19</option>
                              <option value="">20</option>
                              <option value="">21</option>
                              <option value="">22</option>
                              <option value="">23</option>
                              <option value="">24</option>
                              <option value="">25</option>
                              <option value="">26</option>
                              <option value="">27</option>
                              <option value="">28</option>
                              <option value="">29</option>
                              <option value="">30</option>
                            </select>
                          </div>
                          <div class="year-select"><span>YEAR</span>
                            <select id="years">
                              <option value="">17</option>
                              <option value="">18</option>
                              <option value="">19</option>
                              <option value="">20</option>
                              <option value="">21</option>
                              <option value="">22</option>
                              <option value="">23</option>
                              <option value="">24</option>
                              <option value="">25</option>
                              <option value="">26</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="mark-gold">
                        <div class="round">
                          <div class="circles">
                            <div class="circle-1"> </div>
                            <div class="circle-2"> </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="name"><span>JEAN O IMPSUM</span></div> -->
                    </div>
                    <div class="card-back">
                      <div class="tire"></div>
                      <div class="secret-area">
                        <input type="text" maxlength="3" name="number-card" placeholder="000" required="required"/>
                      </div>
                      <div class="chip-card"></div>
                    </div>
                  </div>
                  <!-- <div class="button-sent">
                    <button id="back">VOLTAR</button>
                    <button id="continue">CONTINUAR</button>
                  </div> -->
                </div>

                <hr />
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="btn-signup" id='SignUpForBizbtn'>
                  <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
                  </button>
                </div> 
                </form>
            </div>
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
          alert("Both Fields are required");  
      }  
  });

  $('#SignUpForBizbtn').click(function(e) {
      var username = $('.biz_username').val(); 
      var email = $('.biz_email').val();  
      var password = $('.biz_password').val();  
      var contact = $('.biz_contact').val();    
      var description = $('.biz_description').val();  
      var budget = $('select[name=biz_budget]').val();  
      var specialist = $('select[name=biz_specialist]').val();  
      var workingexp = $('select[name=biz_workingexp]').val();  
      var role = $('.biz_role').val();  
      e.preventDefault();
      if(username != '' && password != '' && email != '')  
      {  
          $.ajax({  
               url:"signup.php",  
               method:"POST",  
               data: {username:username, password:password, email: email, contact:contact, description:description, budget:budget, specialist: specialist, workingexp: workingexp,  role : role},  
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
          alert("Both Fields are required");  
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
                          //alert(data);  
                          if(data == 'No')  
                          {  
                               alert("Wrong Data");  
                          }  
                          else  
                          {  
                               alert("Sign in successfully"); 
                               $('#loginModal').hide();  
                               location.href= 'index.php';  
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
                     alert("Sign out successfully"); 
                     location.href= 'index.php';  
                }  
           });  
      });

 });  

</script>

<?php
$pagetitle = "Become our partner";
ob_start();
?>

<!-- Page Put in Content-->

<link href="css/creditcard.css" rel="stylesheet" >
<div id="band" class="container text-left" style="margin-top:50px" >
  <h1>Welcome to join us!</h1>


<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Easy way to build up your business</h2><br> 
      <h4>This is a new platform for people to create their event which is about photograghy.</h4><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <br><button class="btn-danger btn-lg scrollTobuttom" name="go_bottom" id="go_buttom" onclick="location.href='#SignUpForBizSection'" >Start Your Business</button>
    </div>

    <div class="col-sm-4">
      
    </div>
  </div>
</div>

<p> 
</p>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>POWER</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>LOVE</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>JOB DONE</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>CERTIFIED</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">HARD WORK</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Portfolio</h2><br>
  <h4>What we have created</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>Paris</strong></p>
        <p>Yes, we built Paris</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="newyork.jpg" alt="New York" width="400" height="300">
        <p><strong>New York</strong></p>
        <p>We built New York</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="sanfran.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>San Francisco</strong></p>
        <p>Yes, San Fran is ours</p>
      </div>
    </div>
  </div><br>
  
  <h2>What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"This company is the best. I am so happy with the result!"<br><span>Michael Roe, Vice President, Comment Box</span></h4>
      </div>
      <div class="item">
        <h4>"One word... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4>
      </div>
      <div class="item">
        <h4>"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span></h4>
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
</div>
    <a name="SignUpForBizSection"></a>
<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Choose a payment plan that works for you</h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Free Trial</h1>
        </div>
        <div class="panel-body">
          <p><strong>100</strong> Lorem</p>a
          <p><strong>50</strong> Ipsum</p>
          <p><strong>25</strong> Dolor</p>
          <p><strong>10</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>Free</h3>
          <h4>First month</h4>
<a data-toggle="modal" data-id="5" title="Sign Up" class="btn btn-primary SignUpForBiz" href="#SignUpForBiz">Sign Up</a>
          <!--  <button type="button" class="btn btn-default" name="SignUp_button" class="SignUp_button"  data-toggle="modal" data-target="#SignUpForBiz">
            <span class="glyphicon glyphicon-user"></span>  sign up</button> -->
          <!-- <button class="btn btn-lg biz-signup">sign up</button> -->
        </div>
      </div>      
    </div>        
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Premium</h1>
        </div>
        <div class="panel-body">
          <p><strong>100</strong> Lorem</p>a
          <p><strong>50</strong> Ipsum</p>
          <p><strong>25</strong> Dolor</p>
          <p><strong>10</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$120</h3>
          <h4>per month</h4>
<a data-toggle="modal" data-id="2" title="Sign Up" class="btn btn-primary SignUpForBiz" href="#SignUpForBiz">Sign Up</a>
          <!--  <button type="button" class="btn btn-default" name="SignUp_button" class="SignUp_button"  data-toggle="modal" data-target="#SignUpForBiz">
            <span class="glyphicon glyphicon-user"></span>  sign up</button> -->
          <!-- <button class="btn btn-lg biz-signup">sign up</button> -->
        </div>
      </div>      
    </div>    
  </div>
</div>


<?php
//將緩衝區的內容放到變數裏面，然後清除緩衝區
$pagemaincontent = ob_get_contents();
ob_end_clean();
//套用主板頁面
include("master.php");
?>

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
              <label for="biz_speciality">Speciality</label>
              <select name="biz_speciality">
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
          <div id="paymentInfo">
          <label for="">Payment Information</label>
            <form class="payment-card">
              <div class="payment-card__front">
                <div class="payment-card__group">
                  <label class="payment-card__field">
                    <span class="payment-card__hint">Holder of card</span>
                    <input class="payment-card__input" placeholder="Holder of card" pattern="[A-Za-z, ]{2,}" name="holder-card" required>
                  </label>
                </div>
                <div class="payment-card__group">
                  <label class="payment-card__field">
                    <span class="payment-card__hint">Number of card</span>
                    <input type="text" class="payment-card__input" placeholder="Number of card" pattern="[0-9]{16}" name="number-card" required>
                  </label>
                </div>
                <div class="payment-card__group">
                  <span class="payment-card__caption">valid thru</span>
                </div>
                <div class="payment-card__group payment-card__footer">
                  <label class="payment-card__field payment-card__month">
                    <span class="payment-card__hint">Month</span>
                    <input type="text" class="payment-card__input" placeholder="MM" maxlength="2" pattern="[0-9]{2}" name="mm-card" required>
                  </label>
                  <span class="payment-card__separator">/</span>
                  <label class="payment-card__field payment-card__year">
                    <span class="payment-card__hint">Year</span>
                    <input type="text" class="payment-card__input" placeholder="YY" maxlength="2" pattern="[0-9]{2}" name="year-card" required>
                  </label>
                </div>
              </div>
              </div>
            <button class="payment-card__button" hidden>Send</button>
            </form>

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
    
<script>
$('#SignUpForBizbtn').click(function(e) {
  var username = $('.biz_username').val(); 
  var email = $('.biz_email').val();  
  var password = $('.biz_password').val();  
  var contact = $('.biz_contact').val();    
  var description = $('.biz_description').val();  
  var budget = $('select[name=biz_budget]').val();  
  var speciality = $('select[name=biz_speciality]').val();  
  var workingexp = $('select[name=biz_workingexp]').val();  
  var role = $('.biz_role').val();  
  e.preventDefault();
  if(username != '' && password != '' && email != '')  
  {  
      $.ajax({  
           url:"signup.php",  
           method:"POST",  
           data: {username:username, password:password, email: email, contact:contact, description:description, budget:budget, speciality: speciality, workingexp: workingexp,  role : role},  
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
    
$(document).ready(function(){
  $('.alert').hide();
  $('.SignUpForBiz').click(function() {
     var type = $(this).attr("data-id");
     if(type == 5) {
     $('#register-form-biz .role span').text("Free Trial");
      $('#paymentInfo').hide();
     } else {
     $('#register-form-biz .role span').text("Premium");
      $('#paymentInfo').show();
     }
     $(".biz_role").val(type);
  });
});
</script>
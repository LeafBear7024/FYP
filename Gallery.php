<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

    <link href="g-style.css" rel="stylesheet" type="text/css">
</head>


<meta name="viewport" content="width=device-width, initial-scale=1">
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
<body>
<!-- Nav Bar--> 
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
        <li>  <a href="#">Serivce</a></li>
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

<h2 style="margin-top:50px">PORTFOLIO</h2>
<div id="myBtnContainer" >
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn" onclick="filterSelection('nature')"> Nature</button>
  <button class="btn" onclick="filterSelection('cars')"> Cars</button>
  <button class="btn" onclick="filterSelection('people')"> People</button>
</div>

<!-- Portfolio Gallery Grid -->
<div class="row">
  <div class="column nature">
    <div class="content">
      <img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%">
      <h4>Mountains</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
      <img src="/w3images/lights.jpg" alt="Lights" style="width:100%">
      <h4>Lights</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
      <img src="/w3images/nature.jpg" alt="Nature" style="width:100%">
      <h4>Forest</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>

  <div class="column cars">
    <div class="content">
      <img src="/w3images/cars1.jpg" alt="Car" style="width:100%">
      <h4>Retro</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
      <img src="/w3images/cars2.jpg" alt="Car" style="width:100%">
      <h4>Fast</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
      <img src="/w3images/cars3.jpg" alt="Car" style="width:100%">
      <h4>Classic</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>

  <div class="column people">
    <div class="content">
      <img src="/w3images/people1.jpg" alt="People" style="width:100%">
      <h4>Girl</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column people">
    <div class="content">
      <img src="/w3images/people2.jpg" alt="People" style="width:100%">
      <h4>Man</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column people">
    <div class="content">
      <img src="/w3images/people3.jpg" alt="People" style="width:100%">
      <h4>Woman</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
</div>
<!-- End NAV Bar-->

<!-- Gallery--> 
<!-- 
<h2 style="text-align:center">Slideshow Gallery</h2>

<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="/fyp/image/gallery/g01.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="/fyp/image/gallery/g02.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="/fyp/image/gallery/g03.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="/fyp/image/gallery/g04.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="/fyp/image/gallery/g05.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="/fyp/image/gallery/g06.jpg" style="width:100%">
  </div>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
      <img class="demo cursor" src="/fyp/image/gallery/g01.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
    </div>
    <div class="column">
      <img class="demo cursor" src="/fyp/image/gallery/g02.jpg"" style="width:100%" onclick="currentSlide(2)" alt="Trolltunga, Norway">
    </div>
    <div class="column">
      <img class="demo cursor" src="/fyp/image/gallery/g03.jpg"" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
    </div>
    <div class="column">
      <img class="demo cursor" src="/fyp/image/gallery/g03.jpg"" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
    </div>
    <div class="column">
      <img class="demo cursor" src="/fyp/image/gallery/g05.jpg"" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
    </div>    
    <div class="column">
      <img class="demo cursor" src="/fyp/image/gallery/g06.jpg"" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
    </div>
  </div>
</div>
-->
<!--End Gallery-->

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
    
</body>
</html>
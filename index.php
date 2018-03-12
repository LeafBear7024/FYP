
<?php
$pagetitle = "Home";
ob_start();
?>

<!-- Page Put in Content-->
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:30px">
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

<?php
//將緩衝區的內容放到變數裏面，然後清除緩衝區
$pagemaincontent = ob_get_contents();
ob_end_clean();
//套用主板頁面
include("master.php");
?>
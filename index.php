
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
          <h3>Beautiful</h3>
          <p> Everyone can be a model</p>
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


  <button type="button" id="start_event" name="start_event" class="btn btn-danger center-block"  data-toggle="modal" data-target="#questionSteps">Start Event</button>
  <p> </p>

  <p>The Photo Partner provided a platform for user and service provider to create their event or start business easily.  The person who is beginner in photography can use our platform easy to find their first customer. Let start your event or become our business user to start your new business.
</p>
  <br>
  
</div>

<?php
//將緩衝區的內容放到變數裏面，然後清除緩衝區
$pagemaincontent = ob_get_contents();
ob_end_clean();
//套用主板頁面
include("master.php");
?>
<div id="startEvent" class="modal fade" role="dialog" style="margin-top:50px">   
      <div class="modal-dialog" >  
     <!-- Modal content-->  
         <div class="modal-content">  
          <div class="modal-header">  
            <h4 class="modal-title">Quick start</h4>  
             <button type="button" class="close" data-dismiss="modal">&times;</button>               
          </div>  
          <div class="modal-body">             
            <div class="form-group">                  
              <label for="biz_speciality">Event Type</label>
              <select name="biz_speciality">
                <option value="1">Photographer</option>
                <option value="2">MakeupArtist</option>
                <option value="3">Fashion Shop</option>
                <option value="4">Model</option>
                <option value="5">Venue</option>
              </select>
            </div>         
             <div class="form-group">
              <label for="biz_budget" class="control-label">Total Budget</label>
              <select name="biz_budget">
                <option value="1">$0 - $1000</option>
                <option value="2">$1001 - $5000</option>
                <option value="3">$5001 - $10000</option>
                <option value="4">$10000+</option>
              </select>
            </div>    
            <div class="form-group">          
              <label for="">Provider Working Experience</label>
              <select name="biz_workingexp">
                <option value="1">0 - 2 Years</option>
                <option value="2">3 - 5 Years</option>
                <option value="3">6 - 10 Years</option>
                <option value="4">10 Years+</option>
              </select>
            </div>  
            <hr />
            <br />
            <button type="button" name="submit" id="quickStartEvent" class="btn btn-primary">Quick Start</button>  
          </div>  
         </div>  
      </div>  
   </div> 

<div id="questionSteps" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="js-title-step"></h4>
            </div>
            <div class="modal-body">
                <div class="row hide" data-step="1" data-title="What kind of service you want?">
                    <div class="col-md-12">
                        <div class="jumbotron text-center">
                            <select name="eventType">
                                <option value="1">Family Photography</option>
                                <option value="2">Event Photography</option>
                                <option value="3">Videography</option>
                                <option value="4">Product Photography</option>
                                <option value="5">Wedding Photography</option>
                                <option value="6">Other</option>
                            </select>
                            </div>
                    </div>
                </div>
                <div class="row hide" data-step="2" data-title="How much you are willing to pay">
                    <div class="col-md-12">
                        <div class="jumbotron text-center">
                            <select name="biz_budget">
                                <option value="1">$0 - $1000</option>
                                <option value="2">$1001 - $5000</option>
                                <option value="3">$5001 - $10000</option>
                                <option value="4">$10000+</option>
                            </select>
                            </div>
                    </div>
                </div>
                <div class="row hide" data-step="3" data-title="Please give me more about your event!">
                    <div class="col-md-12">
                        <div class="jumbotron text-center">
                            <label>Event Name</label>  
                            <input type="text" name="contact" id="eventName" class="form-control" required/> 
                            <label>Event Date</label>  
                            <input id="eventDate" type="text" class="form-control" required/>  
                            <label>Event Details</label>  
                            <input type="text" name="eventinfo" id="eventInfo" class="form-control" required/>  
                            <label>Event Location</label>  
                            <input type="text" name="eventlocation" id="eventLocation" class="form-control" required/> 
                            <label>Contact Info</label>  
                            <input type="text" name="contact" id="eventContact" class="form-control" required/>  
                            <input type="hidden" name="requestedbyid" id="requestedbyid" value="<?=$_SESSION['userid']?>" />
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default js-btn-step pull-left" data-orientation="cancel" data-dismiss="modal"></button>
                <button type="button" class="btn btn-warning js-btn-step" data-orientation="previous"></button>
                <button type="button" class="btn btn-success js-btn-step" data-orientation="next"></button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#eventDate').datetimepicker({
      //datepicker:true,
      timepicker:false,
      format:'Y-m-d',
      minDate: new Date()
    });
    $('#questionSteps').modalSteps({
            'completeCallback': function(){ 
                var eventName = $('#eventName').val();
                var eventInfo = $('#eventInfo').val();
                var eventLocation = $('#eventLocation').val();
                var eventDate = $('#eventDate').val();
                var eventType = $('select[name=eventType]').val();
                var eventContact = $('#eventContact').val();
                var requestedbyid = $('#requestedbyid').val();
                $.ajax({  
                    url:"createevent.php",  
                    method:"POST",  
                    data: {eventName:eventName,eventInfo:eventInfo,eventType:eventType,eventLocation:eventLocation,eventDate:eventDate,eventContact:eventContact,serviceproviderid:0,requestedbyid:requestedbyid},  
                    success:function(data) {  
                        if(data == 1) {
                            alert("Event created successfully!");
                            window.location="myevent.php" 
                        } else {
                            alert("There is an error occurred, please try again later");
                        }
                    }  
                });
            }
    });
    $('#start_event').click(function() {
//        // check if user login, prompt login box if user has not yet logged in
//        if('<?=isset($_SESSION['userid'])?>' == 1) {
//            $('#startEvent').modal('show');
//        } else {
//            alert('Please sign in before quickstart an event');
//            $('#login_button').click();
//        }
    });
    $('#quickStartEvent').click(function(e) {  
      var budget = $('select[name=biz_budget]').val();  
      var speciality = $('select[name=biz_speciality]').val();  
      var workingexp = $('select[name=biz_workingexp]').val();  
      e.preventDefault();
      window.location.replace("service.php?budget=" + budget + "&speciality=" + speciality + "&workingexp=" + workingexp);
  });
});
</script>  
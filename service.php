<?php
$pagetitle = "Service";
ob_start();
?>

<!-- Page Put in Content-->


<?php
//將緩衝區的內容放到變數裏面，然後清除緩衝區
$pagemaincontent = ob_get_contents();
ob_end_clean();
//套用主板頁面
include("master.php");
?>
<style>
    .lg-backdrop {
        z-index: 1050;
    }
</style>

<h2 style="margin-top:50px">Service</h2>

<div id="myBtnContainer">
<?php
    // if quick start an event
    if(!empty($_SERVER['QUERY_STRING'])) {
        $getQueries = array();
        parse_str($_SERVER['QUERY_STRING'], $getQueries);
?>
    <script>
        $(document).ready(function() {
            $('select[name=biz_budget]').val(<?=$getQueries['budget']?>);
            $('select[name=biz_speciality]').val(<?=$getQueries['speciality']?>);
            $('select[name=biz_workingexp]').val(<?=$getQueries['workingexp']?>);
            
            $('#updateCriteria').click(function() {
                var budget = $('select[name=biz_budget]').val();
                var speciality = $('select[name=biz_speciality]').val();
                var workingexp = $('select[name=biz_workingexp]').val();
                window.location.href = window.location.href.split("?")[0] + "?speciality=" + speciality + "&budget=" + budget+ "&workingexp=" + workingexp ;
            });
        })
    </script>
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
                <button class="btn btn-primary" id="updateCriteria">Update</button>
            </div>  
<?php
    } else {
?>
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn" onclick="filterSelection('Photographer')">Photographer</button>
  <button class="btn" onclick="filterSelection('MakeupArtist')"> MakeupArtist</button>
  <button class="btn" onclick="filterSelection('Fashion Shop')"> Fashion Shop</button>
  <button class="btn" onclick="filterSelection('Model')"> Model</button>
  <button class="btn" onclick="filterSelection('Venue')"> Venue</button>
<?php
    }
?>
</div>
<!-- Portfolio Gallery Grid -->
<div class="grid">
    
  <div class="grid-sizer"></div>
    <?php
        // if quick start an event
        if(isset($getQueries)) {
            $query = "SELECT * FROM user t1 WHERE budget =" .$getQueries['budget']. " AND workingexp = ". $getQueries['workingexp'] ." AND speciality = ". $getQueries['speciality'];
        } else {
            $query = "SELECT * FROM user t1 WHERE role = 2 or role = 5";
        }
    
        if(isset($_SESSION['userid'])) {
            $currentUserId = $_SESSION['userid'];
        } else {
            $currentUserId = '';
        }
        
          $result = mysqli_query($DBcon, $query);  
          if(mysqli_num_rows($result) > 0)  
          {  
              $speciality = '';
              $workingexp = '';
               while ($row = $result->fetch_assoc())
                {
                    $username = $row['username'];
                    $description = $row['description'];
                    $profilepic = $row['profilepic'] == ''? "image/unknown.jpg": "/fyp/upload/profilepic/" . $row['profilepic'];
                    $specialityID = $row['speciality'];
                    $workingexpID = $row['workingexp'];
                    $contact = $row['contact'];
                    $serviceproviderid = $row['id'];
                    switch($specialityID) {
                        case "1": $speciality = "Photographer"; break;
                        case "2": $speciality = "MakeupArtist"; break;
                        case "3": $speciality = "Fashion Shop"; break;
                        case "4": $speciality = "Model"; break;
                        case "5": $speciality = "Venue"; break;
                    }                
                    switch($workingexpID) {
                        case "1": $workingexp = "0 - 2 Years"; break;
                        case "2": $workingexp = "3 - 5 Years"; break;
                        case "3": $workingexp = "6 - 10 Years"; break;
                        case "4": $workingexp = "10 Years+"; break;
                    }
    ?>
          <div class="grid-item column <?=$speciality?>">
            <div class="content">
              <img src="<?=$profilepic?>" alt="<?=$speciality?>" style="width:100%">
              <h4><?=$username?></h4>
            </div>
              <button type="button" class="btn btn-info moreinfo" data-toggle="modal" data-serviceprovider="<?=$username?>" data-serviceproviderid="<?=$serviceproviderid?>" data-workingexp="<?=$workingexp?>" data-speciality="<?=$speciality?>" data-contact="<?=$contact?>" data-description="<?=$description?>">More Info</button>
            <button type="button" class="btn btn-info interested" data-toggle="modal" data-serviceprovider="<?=$username?>" data-serviceproviderid="<?=$serviceproviderid?>">Hire Me</button>
          </div>
    <?php
                }
          }  
    ?>
  </div>
<!-- END GRID -->
<div id="createEvent" class="modal fade" role="dialog" style="margin-top:50px">   
      <div class="modal-dialog" >  
     <!-- Modal content-->  
         <div class="modal-content">  
          <div class="modal-header">  
            <h4 class="modal-title">I would like to create following event</h4>  
             <button type="button" class="close" data-dismiss="modal">&times;</button>               
          </div>  
          <div class="modal-body">  
             <label>Service Provider</label>  
             <input type="text" name="serviceprovider" id="serviceprovider" class="form-control" / readonly> 
             <label>Event Name</label>  
             <input type="text" name="contact" id="eventName" class="form-control" required/> 
             <label>Event Date</label>  
             <input id="eventDate" type="text" class="form-control" required/>  
             <label>Event Type</label>               
              <br />
              <select name="eventType">
                <option value="1">Family Photography</option>
                <option value="2">Event Photography</option>
                <option value="3">Videography</option>
                <option value="4">Product Photography</option>
                <option value="5">Wedding Photography</option>
                <option value="6">Other</option>
              </select>
             <br /><br />
             <label>Event Details</label>  
             <input type="text" name="eventinfo" id="eventInfo" class="form-control" required/>  
             <label>Event Location</label>  
             <input type="text" name="eventlocation" id="eventLocation" class="form-control" required/> 
             <label>Contact Info</label>  
             <input type="text" name="contact" id="eventContact" class="form-control" required/>  
             <input type="hidden" name="requestedbyid" id="requestedbyid" value="<?=$_SESSION['userid']?>" />
             <input type="hidden" name="serviceproviderid" id="serviceproviderid"/>
              <br />
             <button type="button" name="submit" id="submitEvent" class="btn btn-primary">Submit</button>  
          </div>  
         </div>  
      </div>  
   </div> 
<div id="serviceProviderInfo" class="modal fade" role="dialog" style="margin-top:50px">   
      <div class="modal-dialog" >  
     <!-- Modal content-->  
         <div class="modal-content">  
          <div class="modal-header">  
            <h4 class="modal-title">Service Provider Information</h4>  
             <button type="button" class="close" data-dismiss="modal">&times;</button>               
          </div>  
          <div class="modal-body">  
            <div class="panel-body inf-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table class="table table-condensed table-responsive table-user-information">
                            <tbody>

                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-user text-primary"></span> 
                                            Provider Name     
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <div id="sp_username"></div> 
                                    </td>
                                </tr>


                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                            Specialty                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <div id="sp_specialty"></div>
                                    </td>
                                </tr>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                            Working Experience                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <div id="sp_workingexp"></div> 
                                    </td>
                                </tr>  
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                            Contact                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <div id="sp_contact"></div> 
                                    </td>
                                </tr> 
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                            Description                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary" style="width:350px">
                                        <div id="sp_description"></div> 
                                    </td>
                                </tr>   
                                <tr>        
                                    <td colspan ="2">
                                        <button type="button" name="submit" id="viewGallery" class="btn btn-primary">Gallery</button>  
                                    </td>
                                </tr>                                  
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>  
         </div>  
      </div>  
   </div> 
<script>

 //Filter 
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
    var $grid = $('.grid').imagesLoaded( function() {
       // $('.grid').masonry('destroy');
        $('.grid').removeData('masonry');
      $grid.masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        columnWidth: '.grid-sizer'
      }); 
    });
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

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
$(document).ready(function() {
    $('#eventDate').datetimepicker({
      //datepicker:true,
      timepicker:false,
      format:'Y-m-d',
      minDate: new Date()
    });
    var $grid = $('.grid').imagesLoaded( function() {
      $grid.masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        columnWidth: '.grid-sizer'
      }); 
    });
    
    $('.interested').click(function() {
        // check if user login, prompt login box if user has not yet logged in
        if('<?=isset($_SESSION['userid'])?>' == 1) {
            $('#serviceprovider').val($(this).attr('data-serviceprovider'));
            $('#serviceproviderid').val($(this).attr('data-serviceproviderid'));
            $('#createEvent').modal('show');
        } else {
            alert('Please sign in before apply for an event');
            $('#login_button').click();
        }
    });
    
    $('#submitEvent').click(function() {
        var eventName = $('#eventName').val();
        var eventInfo = $('#eventInfo').val();
        var eventLocation = $('#eventLocation').val();
        var eventDate = $('#eventDate').val();
        var eventType = $('select[name=eventType]').val();
        var eventContact = $('#eventContact').val();
        var serviceproviderid = $('#serviceproviderid').val();
        var requestedbyid = $('#requestedbyid').val();
        $.ajax({  
            url:"createevent.php",  
            method:"POST",  
            data: {eventName:eventName,eventInfo:eventInfo,eventType:eventType,eventLocation:eventLocation,eventDate:eventDate,eventContact:eventContact,serviceproviderid:serviceproviderid,requestedbyid:requestedbyid},  
            success:function(data) {  
                if(data == 1) {
                    alert("Event created successfully!");
                } else {
                    alert("There is an error occurred, please try again later");
                }
            }  
        });
    });

    $('.moreinfo').on('click', function(e) {
        $('#sp_workingexp').text($(this).data('workingexp'));
        $('#sp_username').text($(this).data('serviceprovider'));
        $('#sp_specialty').text($(this).data('speciality'));
        $('#sp_description').text($(this).data('description'));
        $('#sp_contact').text($(this).data('contact'));
        $('#viewGallery').attr('data-spid', $(this).data('serviceproviderid'));
        $('#serviceProviderInfo').modal('show');
    });
    
    $('#viewGallery').on('click', function(e) {
        var spid = '';
        spid = $(this).attr('data-spid');
        $.ajax({  
            url:"getGallery.php",  
            method:"POST",  
            data: {userid:spid},  
            success:function(data) {  
                //var galleryInfo = [{src: '', thumb: ''}];
                var galleryInfo = [];
                if(data == "No") {
                    alert("There is no gallery from the provider right now");
                } else {
                    var returnData = $.parseJSON(data);
                    $.each(returnData, function(key, item) {
                        galleryInfo.push({
                            src : "gallery/" + spid + "/" + item.filename,
                            thumb: "gallery/" + spid + "/" + item.filename,
                        })
                    });
                    $(this).lightGallery({
                        dynamic: true,
                        dynamicEl: galleryInfo
                    });
                }
            }  
        });
    })
});
    
</script>
<style>

/* clear fix */
.grid:after {
  content: '';
  display: block;
  clear: both;
}

/* ---- .grid-item ---- */

.grid-sizer,
.grid-item {
  width: 33.333%;
  background-color: white;
}

.grid-item {
  float: left;
}

.grid-item img {
  display: block;
  width: 100%;
}
</style>
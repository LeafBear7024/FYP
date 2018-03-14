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


<h2 style="margin-top:50px">Service</h2>

<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn" onclick="filterSelection('Photographer')">Photographer</button>
  <button class="btn" onclick="filterSelection('MakeupArtist')"> MakeupArtist</button>
  <button class="btn" onclick="filterSelection('Fashion Shop')"> Fashion Shop</button>
  <button class="btn" onclick="filterSelection('Model')"> Model</button>
  <button class="btn" onclick="filterSelection('Venue')"> Venue</button>
</div>

<!-- Portfolio Gallery Grid -->
<div class="grid">
    
  <div class="grid-sizer"></div>
    <?php
        $query = "  
          SELECT * FROM user t1
          WHERE role = 2 or role = 5 
          ";  
          $result = mysqli_query($DBcon, $query);  
          if(mysqli_num_rows($result) > 0)  
          {  
              $speciality = '';
               while ($row = $result->fetch_assoc())
                {
                    $username = $row['username'];
                    $description = $row['description'];
                    $profilepic = $row['profilepic'] == ''? "image/unknown.jpg": "/fyp/upload/profilepic/" . $row['profilepic'];
                    $specialist = $row['specialist'];
                    $userid = $row['id'];
                    switch($specialist) {
                        case "1": $speciality = "Photographer"; break;
                        case "2": $speciality = "MakeupArtist"; break;
                        case "3": $speciality = "Fashion Shop"; break;
                        case "4": $speciality = "Model"; break;
                        case "5": $speciality = "Venue"; break;
                    }
    ?>
          <div class="grid-item column <?=$speciality?>">
            <div class="content" id="<?=$userid?>">
              <img src="<?=$profilepic?>" alt="<?=$speciality?>" style="width:100%">
              <h4><?=$username?></h4>
              <p><?=$description?></p>
            </div>
            <button type="button" class="btn btn-info interested" data-toggle="modal" data-target="#createEvent" data-serviceprovider="<?=$username?>">I'm Interested!</button>
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
            <h4 class="modal-title">I'm interested on create the following event</h4>  
             <button type="button" class="close" data-dismiss="modal">&times;</button>               
          </div>  
          <div class="modal-body">  
             <label>Service Provider</label>  
             <input type="text" name="serviceprovider" id="serviceprovider" class="form-control" / readonly> 
             <label>Your Contact Info</label>  
             <input type="text" name="contact" id="eventContact" class="form-control" />  
             <label>Event Date</label>  
             <input id="eventDate" type="text" class="form-control" /> 
             <label>Event Information</label>  
             <input type="text" name="eventinfo" id="eventInfo" class="form-control" />  
             <label>Event Location</label>  
             <input type="text" name="eventinfo" id="eventLocation" class="form-control" /> 
              <br />
             <button type="button" name="submit" id="submit" class="btn btn-primary">Submit</button>  
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
      //timepicker:false,
      //format:'d.m.Y'
    });
    var $grid = $('.grid').imagesLoaded( function() {
      $grid.masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        columnWidth: '.grid-sizer'
      }); 
    });
    
    $('.interested').click(function() {
        $('#serviceprovider').val($(this).attr('data-serviceprovider'));
    });

    $('.content').on('click', function(e) {
        var userid = this.id;
        $.ajax({  
            url:"getGallery.php",  
            method:"POST",  
            data: {userid:userid},  
            success:function(data) {  
                //var galleryInfo = [{src: '', thumb: ''}];
                var galleryInfo = [];
                if(data == "No") {
                    alert("There is no gallery from the provider right now");
                } else {
                    var returnData = $.parseJSON(data);
                    $.each(returnData, function(key, item) {
                        galleryInfo.push({
                            src : "gallery/" + userid + "/" + item.filename,
                            thumb: "gallery/" + userid + "/" + item.filename,
                        })
                    });
                    $(this).lightGallery({
                        dynamic: true,
                        dynamicEl: galleryInfo
                    });
                }
            }  
        });
    });

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
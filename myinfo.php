
<?php
$pagetitle = "My Info";
ob_start();
?>

<div id="band" class="container text-left" style="margin-top:50px" >
<h1>My Info</h1>
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:500px;" title="" class="img-circle img-thumbnail isTooltip" src="" id="profilepic" data-original-title="Usuario"> 
            <input id="profile-image-upload" class="hidden" type="file">
            <ul title="Ratings" class="list-inline ratings text-center">
            </ul>
        </div>
        <div class="col-md-6">
            <strong>Information</strong><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user text-primary"></span> 
                                Username                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="myinfo_username"></div> 
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                Role                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="myinfo_role"></div>
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Email                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="myinfo_email"></div> 
                        </td>
                    </tr>  
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-time text-primary"></span> 
                                Join Date                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="joindate"></div> 
                        </td>
                    </tr>   

                     <tr>        
                        <td>
                           <button class="btn btn-primary navbar-btn" name="update" id="update">Update</button> 
                        </td>
                    </tr>                                      
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<div id="updateInfo" class="modal fade" role="dialog" style="margin-top:50px">   
  <div class="modal-dialog" >  
 <!-- Modal content-->  
     <div class="modal-content">  
      <div class="modal-header">  
        <h4 class="modal-title">Update user information</h4>  
         <button type="button" class="close" data-dismiss="modal">&times;</button>               
      </div>  
      <div class="modal-body">  
         <label>Username</label>  
         <input type="text" name="form_username" id="form_username" class="form-control" / readonly> 
         <label>Email</label>  
         <input type="text" name="form_email" id="form_email" class="form-control" required/>  
         <label>Password</label>  
         <input type="password" name="form_password" id="form_password" class="form-control" required/>
         <label>Event Information</label>  
         <input type="text" name="eventinfo" id="eventInfo" class="form-control" required/>  
         <label>Event Location</label>  
         <input type="text" name="eventinfo" id="eventLocation" class="form-control" required/> 
         <label>Your Contact Info</label>  
         <input type="text" name="contact" id="eventContact" class="form-control" required/>  
         <input type="hidden" name="requestedbyid" id="requestedbyid" value="<?=$_SESSION['userid']?>" />
         <input type="hidden" name="serviceproviderid" id="serviceproviderid"/>
          <br />
         <button type="button" name="submit" id="submitEvent" class="btn btn-primary">Submit</button>  
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

<style>
input.hidden {
    position: absolute;
    left: -9999px;
}

#profilepic {
    cursor: pointer;
}
</style>
<script>
function diffToToday(s) {
  var today = new Date();
  today.setHours(0,0,0);
  return Math.round((toDate(s) - today) / 8.64e7);
}
$(document).ready(function(){ 
  var username = '<?=$_SESSION['username']?>';
  $.ajax({  
     url:"getuserinfo.php",  
     method:"POST",  
     data: {username:username},  
     success:function(data)  
     {  
      var resultData = $.parseJSON(data);
      var joinDate = resultData.joindate;
         
      // set free trial day to one month later
      var expiryDate = new Date().setDate(new Date().getDate() - 30);
      $('#myinfo_username').text(resultData.username);
      $('#myinfo_email').text(resultData.email);
      $('#myinfo_role').text(resultData.roleName);
      if(resultData.role == 5) {
          if(new Date(expiryDate) <= new Date(joinDate)  ) {
            $('#joindate').text(joinDate);
          } else {
            var expiryInfo = " (Free trial Expired, please consider <button class='btn btn-default' data-toggle='modal' data-target='#charge'>Upgrade</button>)"
            $('#joindate').html(joinDate + expiryInfo);
          }
      } else {
        $('#joindate').text(joinDate);
      }
      if(resultData.profilepic === '' || resultData.profilepic === null) {
        $('#profilepic').attr("src", "image/unknown.jpg");
      } else {
        $('#profilepic').attr("src", "upload/profilepic/" + resultData.profilepic);
      }
     }  
  });  
  $('#update').click(function() {
     $('#updateInfo').modal('show'); 
  });
  $('#profilepic').on('click', function() {
      $('#profile-image-upload').click();
      $('#profile-image-upload').change(function() {

        var file_data = $('#profile-image-upload').prop('files')[0];  
        var form_data = new FormData();    
        form_data.append('username', username); // Username
        form_data.append('file', file_data);  // File

        // check if user upload image
        if(file_data.type.indexOf('image') < 0) {
          alert("Sorry , please upload an image!");
        } else {
          $.ajax({
              url: 'uploadPic.php', 
              dataType: 'text', // datatype post back from PHP
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,                         
              method: 'POST',
              success: function(response){
                  if(response == 1) {
                    alert("Profile picture updated successfully!");
                  } else {
                    alert("Sorry, there is an error, please try again later");
                  }
                  location.reload();
              }
           });

        }
      });
  }); 
});
</script>

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
         <input type="password" name="form_password" id="form_password" class="form-control" placeholder="Leave blank if password remain unchanged" required/>
          
          <!--- business user info---->
         <div id="bizUserInfo" style="display:none">
             <label>Contact</label>  
             <input type="text" name="form_contact" id="form_contact" class="form-control" required/>  
             <label>Description</label>  
             <input type="text" name="form_description" id="form_description" class="form-control" required/>  
          </br>
            <div class="form-group">
              <label for="form_budget" class="control-label">Budget</label>
              <select name="form_budget">
                <option value="1">$0 - $1000</option>
                <option value="2">$1001 - $5000</option>
                <option value="3">$5001 - $10000</option>
                <option value="4">$10000+</option>
              </select>
            </div>            
            <div class="form-group">                  
              <label for="form_speciality">Speciality</label>
              <select name="form_speciality">
                <option value="1">Photographer</option>
                <option value="2">MakeupArtist</option>
                <option value="3">Fashion Shop</option>
                <option value="4">Model</option>
                <option value="5">Venue</option>
              </select>
            </div>            
            <div class="form-group">          
              <label for="form_workingexp">Working Experience</label>
              <select name="form_workingexp">
                <option value="1">0 - 2 Years</option>
                <option value="2">3 - 5 Years</option>
                <option value="3">6 - 10 Years</option>
                <option value="4">10 Years+</option>
              </select>
            </div>
           </div>
          <br />
         <button type="button" name="submit" id="updateInfoBtn" class="btn btn-primary">Update</button>  
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
  var userid = <?=$_SESSION['userid']?>  ;
  $.ajax({  
     url:"getuserinfo.php",  
     method:"POST",  
     data: {userid:userid},  
     success:function(data)  
     {  
      var resultData = $.parseJSON(data);
      var joinDate = resultData.joindate;
         
      // set normal user info in updateInfo
      $('#form_username').val(resultData.username);
      $('#form_email').val(resultData.email);
         
      // set business user info in updateInfo
      if(resultData.role == 2 || resultData.role == 5) {
          $('#form_contact').val(resultData.contact);
          $('#form_description').val(resultData.description);
          $('select[name=form_budget]').val(resultData.budget);
          $('select[name=form_speciality]').val(resultData.speciality);
          $('select[name=form_workingexp]').val(resultData.workingexp);
          $('#bizUserInfo').show();
      }
         
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
  $('#updateInfoBtn').click(function() {
      var userid = <?=$_SESSION['userid']?>  ;
      var email = $('#form_email').val();   
      var password = $('#form_password').val();   
      $.ajax({
              url: 'updatemyinfo.php', 
              dataType: 'text', // datatype post back from PHP
              data: {userid: userid, email: email, password: password},                         
              method: 'POST',
              success: function(response){
                  if(response == 1) {
                    alert("Your Info has been updated successfully!");
                      location.reload();
                  } else if(response == 2) {
                      alert("Email has already been used, please try another one");
                  } else {
                    alert("Sorry, there is an error, please try again later");
                  }
              }
           });
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
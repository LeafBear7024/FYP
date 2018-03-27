
<?php
$pagetitle = "My Info";
ob_start();
?>

<link href="css/creditcard.css" rel="stylesheet" >
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
                    
                    <tr class="bizUserInfo" style="display:none">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Contact                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="myinfo_contact"></div> 
                        </td>
                    </tr> 
                    <tr class="bizUserInfo" style="display:none">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Description                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="myinfo_description"></div> 
                        </td>
                    </tr>   
                    <tr class="bizUserInfo" style="display:none">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Budget                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                              <select name="myinfo_budget" disabled=true>
                                <option value="1">$0 - $1000</option>
                                <option value="2">$1001 - $5000</option>
                                <option value="3">$5001 - $10000</option>
                                <option value="4">$10000+</option>
                              </select>
                        </td>
                    </tr>   
                    <tr class="bizUserInfo" style="display:none">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Speciality                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                              <select name="myinfo_speciality" disabled=true>
                                <option value="1">Photographer</option>
                                <option value="2">MakeupArtist</option>
                                <option value="3">Fashion Shop</option>
                                <option value="4">Model</option>
                                <option value="5">Venue</option>
                              </select>
                        </td>
                    </tr>   
                    <tr class="bizUserInfo" style="display:none">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Working Experience                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                              <select name="myinfo_workingexp" disabled=true>
                                <option value="1">0 - 2 Years</option>
                                <option value="2">3 - 5 Years</option>
                                <option value="3">6 - 10 Years</option>
                                <option value="4">10 Years+</option>
                              </select>
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
         <input type="password" name="form_password" id="form_password" class="form-control" placeholder="Leave blank if your password remain unchanged" required/>
          
          <!--- business user info---->
         <div class="bizUserInfo" style="display:none">
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


<div id="charge" class="modal fade" role="dialog" style="margin-top:50px">   
  <div class="modal-dialog" >  
 <!-- Modal content-->  
     <div class="modal-content">  
      <div class="modal-header">  
        <h4 class="modal-title">Upgrade to Premium</h4>  
         <button type="button" class="close" data-dismiss="modal">&times;</button>               
      </div>  
    <div class="modal-body" id="paymentInfo">
      <label for=""><span style="color:red">Fee : $120</span></label>
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
         <br />  
         <button type="button" name="submit" id="upgradeToPremium" class="btn btn-primary">Upgrade</button> 
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
      $('#updateInfoBtn').attr('data-userrole',resultData.role);
         
      // set business user info in updateInfo
      if(resultData.role == 2 || resultData.role == 5) {
          // preset info
          $('#myinfo_contact').text(resultData.contact);
          $('#myinfo_description').text(resultData.description);
          $('select[name=myinfo_budget]').val(resultData.budget);
          $('select[name=myinfo_speciality]').val(resultData.speciality);
          $('select[name=myinfo_workingexp]').val(resultData.workingexp);
          
          // preset updateinfo
          $('#form_contact').val(resultData.contact);
          $('#form_description').val(resultData.description);
          $('select[name=form_budget]').val(resultData.budget);
          $('select[name=form_speciality]').val(resultData.speciality);
          $('select[name=form_workingexp]').val(resultData.workingexp);
          $('.bizUserInfo').show();
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
            var expiryInfo = " (Free trial Expired, please <button class='btn btn-default' data-toggle='modal' data-target='#charge'>Upgrade</button>)"
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
    $('#upgradeToPremium').click(function() {
      var userid = <?=$_SESSION['userid']?> ;
      $.ajax({
              url: 'upgradetopremium.php', 
              dataType: 'text', // datatype post back from PHP
              data: {userid: userid},                         
              method: 'POST',
              success: function(response){
                  if(response == 1) {
                    alert("You have been upgraded to premium, enjoy!");
                      location.reload();
                  } else {
                    alert("Sorry, there is an error, please try again later");
                  }
              }
           });
  }); 
  $('#updateInfoBtn').click(function() {
      var userid = <?=$_SESSION['userid']?>  ;
      var email = $('#form_email').val();   
      var password = $('#form_password').val();   
      var userrole = $(this).data('userrole');
      if(userrole == 2 || userrole == 5) {
        var contact = $('#form_contact').val();  
        var description = $('#form_description').val();
        var budget = $('select[name=form_budget]').val();
        var speciality = $('select[name=form_speciality]').val();
        var workingexp = $('select[name=form_workingexp]').val();
        var data = {userrole : userrole, userid: userid, email: email, password: password, contact: contact, description: description, budget: budget, speciality: speciality, workingexp: workingexp };
      } else {
        var data = {userrole : userrole, userid: userid, email: email, password: password};
      }
      $.ajax({
              url: 'updatemyinfo.php', 
              dataType: 'text', // datatype post back from PHP
              data: data,                         
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
<<<<<<< HEAD
        form_data.append('userid', <?=$_SESSION['userid']?>); // userid
=======
        form_data.append('userid', <?=$_SESSION['userid']?>); // Username
>>>>>>> 2eb977c64ea383776f03c610539a833bd57682f3
=======
        form_data.append('userid', <?=$_SESSION['userid']?>); // Username
>>>>>>> 2eb977c64ea383776f03c610539a833bd57682f3
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
                  // location.reload();
              }
           });

        }
      });
  }); 
});
</script>
<?php
$pagetitle = "My Event";
ob_start();
?>
<?php
//將緩衝區的內容放到變數裏面，然後清除緩衝區
$pagemaincontent = ob_get_contents();
ob_end_clean();
//套用主板頁面
include("master.php");
?>


<div id="band" class="container text-left" style="margin-top:50px" >
  <h1>My Event</h1>
  
  <div class="table-responsive">
  <div>
    <div class="col-md-12">
    <button type="button" class="btn btn-info createEventBtn" data-toggle="modal">Create your own event</button>
    <table id="event_data" class="table table-condensed table-hover table-striped">
      <thead>
        <tr ng-click="selectPerson()">
<!--          <th data-column-id="eventName">Name</th>-->
          <th data-column-id="eventDate">Date</th>
<!--          <th data-column-id="eventType">Event Type</th>-->
          <th data-column-id="eventInfo">Detail</th>
          <th data-column-id="eventBudget">Budget</th>
<!--          <th data-column-id="eventLocation">Event location</th> -->
          <th data-column-id="serverprovidername">Provider</th>
<!--          <th data-column-id="eventContact">Contact</th>-->
          <th data-column-id="serverprovideremail">Email</th>
          <th data-column-id="response">Response</th>
<!--          <th data-column-id="systemstatus">SystemStatus</th>-->
          <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
        </tr>
      </thead>  
    </table>
    </div>
<!--
  <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
        
          <dl >
            <dt >ID</dt >
            <dd ></dd >
            <dt >Event Name</dt >
            <dd ></dd >
            <dt >Event location</dt >
            <dd ></dd >
            <dt >Event Date</dt >
            <dd ></dd >
            <dt >Event contact</dt >
            <dd ></dd >
          </dl >

        </div>
      </div>
    </div>
-->
</div>
<div id="createEvent" class="modal fade" role="dialog">  
  <div class="modal-dialog">  
 <!-- Modal content-->  
     <div class="modal-content">  
      <div class="modal-header">  
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create your own event</h4>  <br />
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
           <label>Event Budget</label>               
          <br />
          <select name="eventBudget">
            <option value="1">$0 - $1000</option>
            <option value="2">$1001 - $5000</option>
            <option value="3">$5001 - $10000</option>
            <option value="4">$10000+</option>
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
<div id="eventDetail" class="modal fade" role="dialog">  
  <div class="modal-dialog">  
 <!-- Modal content-->  
     <div class="modal-content">  
      <div class="modal-header">  
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Event Detail</h4>  <br />
        <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user text-primary"></span> 
                                Name                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="eventDetail_eventName"></div> 
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                Info                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <textarea id="eventDetail_eventInfo" readonly style="resize:none"></textarea>
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Location                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="eventDetail_eventLocation"></div> 
                        </td>
                    </tr> 
                    
                    <tr class="bizUserInfo">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Date                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="eventDetail_eventDate"></div> 
                        </td>
                    </tr> 
                    <tr class="bizUserInfo">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Type                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="eventDetail_eventType"></div> 
                        </td>
                    </tr>   
                    <tr class="bizUserInfo">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Budget                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="eventDetail_eventBudget"></div> 
                        </td>
                    </tr>   
                    <tr class="bizUserInfo">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Contact                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <div id="eventDetail_eventContact"></div> 
                        </td>
                    </tr>   
                    <tr class="bizUserInfo">        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                Response                                               
                            </strong>
                        </td>

                        <td class="text-primary">
                            <div id="eventDetail_response"></div> 
                        </td>
                    </tr>                                      
                </tbody>
            </table>
            </div>
        </div>
      </div>
    </div>
</div>
      
<script>  
 $(document).ready(function(){  
     $('#eventDate').datetimepicker({
      timepicker:false,
      format:'Y-m-d',
      minDate: new Date()
    });
    $('.createEventBtn').click(function() {
        $('#createEvent').modal('show');
    });
    $('#submitEvent').click(function() {
        var eventName = $('#eventName').val();
        var eventInfo = $('#eventInfo').val();
        var eventLocation = $('#eventLocation').val();
        var eventDate = $('#eventDate').val();
        var eventType = $('select[name=eventType]').val();
        var eventBudget = $('select[name=eventBudget]').val();
        var eventContact = $('#eventContact').val();
        var serviceproviderid = 0;
        var requestedbyid = $('#requestedbyid').val();
        $.ajax({  
            url:"createevent.php",  
            method:"POST",  
            data: {eventName:eventName,eventInfo:eventInfo,eventType:eventType,eventBudget:eventBudget,eventLocation:eventLocation,eventDate:eventDate,eventContact:eventContact,serviceproviderid:serviceproviderid,requestedbyid:requestedbyid,response:4},  
            success:function(data) {  
                if(data == 1) {
                    alert("Event created successfully!");                            window.location="myevent.php" 
                } else {
                    alert("There is an error occurred, please try again later");
                }
            }  
        });
    });
  var grid = $('#event_data').bootgrid({
    ajax: true,
    rowSelect: true,
    "serverSide": true,
    post: function()
    {
        return {
            userid: "<?=$_SESSION['userid']?>"
        };
    },
    labels: {
        noResults: 'No event is found right now!'
    },
    url: "getmyevent.php",
    formatters: {
        "commands": function(column, row) {  
//            if(row.systemstatus == 'Active') {
//                var activeBtn = "<button type='button' class='btn btn-danger btn-xs Inactive' data-row-id='"+row.id+"'>Inactive</button>";
//            } else {
//               var activeBtn = "<button type='button' class='btn btn-success btn-xs Active' data-row-id='"+row.id+"'>Active</button>";
//            }
            var actionBtn = "";
            if(row.response == 'Waiting') {
                actionBtn = "<button type='button' class='btn btn-danger btn-xs reject' data-row-id='"+row.id+"'>Reject</button>" + 
                "&nbsp;<button type='button' class='btn btn-success btn-xs accept' data-row-id='"+row.id+"'>Accpet</button>";
            }
            var detailBtn = "<button type='button' class='btn btn-info btn-xs detail' data-row-id='"+row.id+"'>Detail</button>";
            return actionBtn + "  " + detailBtn;
//            return activeBtn + "  " + detailBtn;
        }
    }
   }).on("loaded.rs.jquery.bootgrid", function() {
    grid.find(".accept").on("click", function(e)
    {
        var clickedId = $(this).data("row-id");
        var response = updateEvent(clickedId, 2);
    }).end().find(".reject").on("click", function(e)
    {
        var clickedId = $(this).data("row-id");
        var response = updateEvent(clickedId, 3);
    }).end().find(".detail").on("click", function(e)
    {
        var eventID = $(this).data("row-id");
        getEvent(eventID);
    });
   });
//     .on("loaded.rs.jquery.bootgrid", function() {
//    grid.find(".Inactive").on("click", function(e)
//    {
//        var clickedId = $(this).data("row-id");
//        var response = updateEvent(clickedId, 2);
//    }).end().find(".Active").on("click", function(e)
//    {
//        var clickedId = $(this).data("row-id");
//        var response = updateEvent(clickedId, 1);
//    });
//   });
     
    function getEvent(eventID) {
         $.ajax({  
            url:"geteventdetail.php",  
            method:"POST",  
            data: {eventID:eventID},  
            success:function(data) {  
                if(data) {
                    var resultData = $.parseJSON(data);
                    console.log(resultData);
                    $('#eventDetail_eventContact').text(resultData.eventContact);
                    $('#eventDetail_eventDate').text(resultData.eventDate);
                    $('#eventDetail_eventInfo').text(resultData.eventInfo);
                    $('#eventDetail_eventLocation').text(resultData.eventLocation);
                    $('#eventDetail_eventName').text(resultData.eventName);
                    $('#eventDetail_eventType').text(resultData.eventType);
                    $('#eventDetail_eventBudget').text(resultData.eventBudget);
                    $('#eventDetail_response').text(resultData.response);
                    $('#eventDetail').modal('show');
                } else {
                    alert("There is an error when getting event detail.Please try again later");
                }
            }  
        });
    }
     
    function updateEvent(clickedId, action) {
         $.ajax({  
            url:"updatemyevent.php",  
            method:"POST",  
            data: {clickedId:clickedId, action:action},  
            success:function(data) {  
                if(data == 1) {
                    alert("Update successfully");
                    grid.bootgrid('reload');
                } else {
                    alert("There is an error when updateing");
                }
            }  
        });
    }
 });  
 </script>  
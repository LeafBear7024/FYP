<?php
$pagetitle = "Get Your Job";
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
  <h1>Get Your Job</h1>
  
  <div class="table-responsive">
  <div>
    <div class="col-md-12">
    <table id="event_data" class="table table-condensed table-hover table-striped">
      <thead>
        <tr ng-click="selectPerson()">
          <th data-column-id="eventName">Name</th>
          <th data-column-id="eventDate">Date</th>
          <th data-column-id="eventType">Type</th>
          <th data-column-id="eventInfo">Detail</th>
          <th data-column-id="eventBudget">Budget</th>
          <th data-column-id="eventLocation">Location</th> 
          <th data-column-id="eventContact">Contact</th>
          <th data-column-id="response">Status</th>
          <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
        </tr>
      </thead>  
    </table>
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
    url: "getalljob.php",
    formatters: {
        "commands": function(column, row) {  
            var actionBtn = "";
            if(row.response == 'Vacant') {
                actionBtn = "<button type='button' class='btn btn-danger btn-xs Apply' data-row-id='"+row.id+"'>Apply</button>";
            } else {
//               return "<button type='button' class='btn btn-success btn-xs Active' data-row-id='"+row.id+"'>Active</button>";
            }
            var detailBtn = "<button type='button' class='btn btn-info btn-xs detail' data-row-id='"+row.id+"'>Detail</button>";
            return actionBtn + "  " + detailBtn;
        }
    }
   }).on("loaded.rs.jquery.bootgrid", function() {
    grid.find(".Apply").on("click", function(e)
    {
        var serviceproviderid =  "<?=$_SESSION['userid']?>";
        var clickedId = $(this).data("row-id");
        var response = applyJob(clickedId, 5, serviceproviderid);
    }).end().find(".Active").on("click", function(e)
    {
        var clickedId = $(this).data("row-id");
        var response = updateEvent(clickedId, 1);
    }).end().find(".detail").on("click", function(e)
    {
        var eventID = $(this).data("row-id");
        getEvent(eventID);
    });
   });
     
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
     
    function applyJob(clickedId, action, serviceproviderid) {
         $.ajax({  
            url:"applyjob.php",  
            method:"POST",  
            data: {clickedId:clickedId, action:action, serviceproviderid: serviceproviderid},  
            success:function(data) {  
                if(data == 1) {
                    alert("Apply job successfully!");
                    grid.bootgrid('reload');
                } else {
                    alert("There is an error when updateing");
                }
            }  
        });
    }
 });  
 </script>  
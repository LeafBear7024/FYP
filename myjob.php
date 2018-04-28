<?php
$pagetitle = "My Job";
ob_start();
?>

<div id="band" class="container text-left" style="margin-top:50px" >
  <h1>My Job</h1>
  
  <div class="table-responsive">
  <div>
    <div class="col-md-12">
    <button type="button" class="btn btn-danger getAJob" data-toggle="modal">Get A Job!</button>
    <table id="event_data" class="table table-condensed table-hover table-striped">
      <thead>
        <tr ng-click="selectPerson()">
          <th data-column-id="eventName">Name</th>
          <th data-column-id="eventDate">Date</th>
          <!-- <th data-column-id="eventInfo">Detail</th> -->
<!--          <th data-column-id="eventLocation">Job location</th> -->
          <th data-column-id="eventBudget">Budget</th>
          <th data-column-id="requestedbyname">Requester</th>
          <th data-column-id="requestedbyemail">Email</th>
<!--          <th data-column-id="eventContact">Job contact</th>-->
          <th data-column-id="response" >Response</th>
<!--          <th data-column-id="systemstatus">SystemStatus</th>-->
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
                            <textarea id="eventDetail_eventInfo" readonly style="resize:none" cols=50 rows=8></textarea>
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
<?php
//將緩衝區的內容放到變數裏面，然後清除緩衝區
$pagemaincontent = ob_get_contents();
ob_end_clean();
//套用主板頁面
include("master.php");
?>

<script>  
 $(document).ready(function(){  
    $('.getAJob').click(function() {
        location.href = "getajob.php"
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
        noResults: 'No job is found right now!'
    },
    url: "getmyjob.php",
    formatters: {
        "commands": function(column, row) { 
            var actionBtn = "";
            if(row.response == 'Pending') {
                actionBtn =  "<button type='button' class='btn btn-danger btn-xs reject' data-row-id='"+row.id+"'>Reject</button>" + 
                "&nbsp;<button type='button' class='btn btn-success btn-xs accept' data-row-id='"+row.id+"'>Accpet</button>";
            }
            var detailBtn = "<button type='button' class='btn btn-info btn-xs detail' data-row-id='"+row.id+"'>Detail</button>";
            return actionBtn + "  " + detailBtn;
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
            url:"updatemyjob.php",  
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
<?php
$pagetitle = "My Job";
ob_start();
?>
<?php
//將緩衝區的內容放到變數裏面，然後清除緩衝區
$pagemaincontent = ob_get_contents();
ob_end_clean();
//套用主板頁面
include("master.php");
?>



<!-- Page Put in Content-->
<div id="band" class="container text-left" style="margin-top:50px" >
  <h1>My Job</h1>
  
  <div class="table-responsive">
  <div>
    <div class="col-md-12">
    
    <table id="event_data" class="table table-condensed table-hover table-striped">
      <thead>
        <tr ng-click="selectPerson()">
          <th data-column-id="eventName">Job Name</th>
          <th data-column-id="eventInfo">Job Info</th>
          <th data-column-id="eventLocation">Job location</th> 
          <th data-column-id="eventDate">Job Date</th>
          <th data-column-id="eventContact">Job contact</th>
          <th data-column-id="response" >Response</th>
          <th data-column-id="systemstatus">SystemStatus</th>
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
<script>  
 $(document).ready(function(){  
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
    url: "getmyevent.php",
    formatters: {
        "commands": function(column, row) {  
            if(row.response == 'Pending') {
                return "<button type='button' class='btn btn-danger btn-xs reject' data-row-id='"+row.id+"'>Reject</button>" + 
                "&nbsp;<button type='button' class='btn btn-success btn-xs accept' data-row-id='"+row.id+"'>Accpet</button>";
            }
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
    });
   });
     
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
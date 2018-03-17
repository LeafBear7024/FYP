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
    <div class="col-md-8">
    
    <table id="event_data" class="table table-condensed table-hover table-striped">
      <thead>
        <tr ng-click="selectPerson()">
          <th data-column-id="eventName">Job Name</th>
          <th data-column-id="eventInfo">Job Info</th>
          <th data-column-id="eventLocation">Job location</th> 
          <th data-column-id="eventDate">Job Date</th>
          <th data-column-id="eventContact">Job contact</th>
          <th data-column-id="status" data-type="numeric">Status</th>
          <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
        </tr>
      </thead>  
    </table>
    </div>
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
</div>
 <script>  
 $(document).ready(function(){  

  var eventTable = $('#event_data').bootgrid({
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
        noResults: 'No Job is found right now!'
    },
    url: "getmyjob.php",
    formatters: {
     "commands": function(column, row)
     {   
    return"<button type='button' class='btn btn-success btn-xs update' data-row-id='"+row.id+"'>Accpet</button>"+
    "&nbsp;<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id+"'>Reject</button>";

     }
    }
   });
 });  
 </script>  
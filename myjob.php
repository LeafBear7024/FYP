<?php
$pagetitle = "Job List";
ob_start();
?>

<!-- Page Put in Content-->
<div id="band" class="container text-left" style="margin-top:50px" >
  <h1>Job List</h1>
  <p><em>To be confirm</em></p>
  
  <div class="table-responsive">
  <div>
    <div class="col-md-8">
    <div align="right">
      <button type="button" id="add_button" data-toggle="modal" data-target="#productModal" class="btn btn-info btn-lg">Add</button>
    </div>
    <table id="event_data" class="table table-condensed table-hover table-striped">
      <thead>
        <tr ng-click="selectPerson()">
          <th data-column-id="id" data-type="numeric">ID</th>
          <th data-column-id="event_name">Event Name</th>
          <th data-column-id="event_location">Event location</th> 
          <th data-column-id="event_date">Event Date</th>
          <th data-column-id="event_contact">Event contact</th>
          <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
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
            <dt >Event contac</dt >
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
     return{
    id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
     };
    },
    url: "fetch.php",
    formatters: {
     "commands": function(column, row)
     {   
    return"<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id+"'>Edit</button>"+
    "&nbsp;<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id+"'>Delete</button>";

     }
    }
   });
 });  
 </script>  
<?php
//將緩衝區的內容放到變數裏面，然後清除緩衝區
$pagemaincontent = ob_get_contents();
ob_end_clean();
//套用主板頁面
include("master.php");
$query = "SELECT * FROM event";
$result = mysqli_query($DBcon, $query);
$output = '';
while($row = mysqli_fetch_array($result))
{
  $output .= '<option value="'.$row["id"].'">'.$row["event_name"].'</option>';
}
?>


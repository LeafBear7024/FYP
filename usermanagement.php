<?php
$pagetitle = "User Management";
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
  <h1>User Management</h1>
  
  <div class="table-responsive">
  <div>
    <div class="col-md-12">
    
    <table id="event_data" class="table table-condensed table-hover table-striped">
      <thead>
        <tr ng-click="selectPerson()">
          <th data-column-id="username">Username</th>
          <th data-column-id="email">Email</th> 
          <th data-column-id="contact">Contact</th>
          <th data-column-id="role">Role</th>
          <th data-column-id="createdatetime">Join date</th>
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
            userrole: "<?=$_SESSION['role']?>"
        };
    },
    labels: {
        noResults: 'No user is found right now!'
    },
    url: "getalluser.php",
    formatters: {
        "commands": function(column, row) {  
            if(row.systemstatus == 'Active') {
                return "<button type='button' class='btn btn-danger btn-xs Inactive' data-row-id='"+row.id+"'>Inactive</button>";
            } else {
               return "<button type='button' class='btn btn-success btn-xs Active' data-row-id='"+row.id+"'>Active</button>";
            }
        }
    }
   }).on("loaded.rs.jquery.bootgrid", function() {
    grid.find(".Inactive").on("click", function(e)
    {
        var clickedId = $(this).data("row-id");
        var response = updateEvent(clickedId, 2);
    }).end().find(".Active").on("click", function(e)
    {
        var clickedId = $(this).data("row-id");
        var response = updateEvent(clickedId, 1);
    });
   });
     
    function updateEvent(clickedId, action) {
         $.ajax({  
            url:"updateuser.php",  
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
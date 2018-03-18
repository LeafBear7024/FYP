
<?php
$pagetitle = "My Gallery";
ob_start();
?>

<div id="band" class="container text-left" style="margin-top:50px" >
<h1>My Gallery</h1>
<div class="panel-body inf-content">
    <!-- Page Put in Content-->
    <div id="band" class="container text-left" style="margin-top:50px" >
      <div class="table-responsive">
      <div>
        <div class="col-md-12">

          <form>
            <div id="queue"></div>
            <input id="file_upload" name="file_upload" type="file" multiple="true">
          </form>

        <table id="mygallery" class="table table-condensed table-hover table-striped">
          <thead>
            <tr ng-click="selectPerson()">
              <th data-column-id="filename">File Name</th>
              <th data-column-id="systemstatus">SystemStatus</th>
              <th data-column-id="datetime">Create Time</th>
              <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
            </tr>
          </thead>  
        </table>
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
  var grid = $('#mygallery').bootgrid({
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
        noResults: 'No gallery is found right now!'
    },
    url: "getmygallery.php",
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
        var response = updateGallery(clickedId, 2);
    }).end().find(".Active").on("click", function(e)
    {
        var clickedId = $(this).data("row-id");
        var response = updateGallery(clickedId, 1);
    });
   });
     
    function updateGallery(clickedId, action) {
         $.ajax({  
            url:"updategallery.php",  
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

    <?php $timestamp = time();?>
    $(function() {
      $('#file_upload').uploadify({
        'formData'     : {
          'timestamp' : '<?php echo $timestamp;?>',
          'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
          'userid'     : '<?=$_SESSION['userid']?>'
        },
        'swf'      : 'js/uploadify.swf',
        'uploader' : 'uploadify.php',
        'removeTimeout' : 60,
          'onUploadSuccess' : function(file, data, response) {
            console.log('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
        }
      });
    });
});  
</script>
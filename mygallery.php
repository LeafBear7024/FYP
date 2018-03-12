
<?php
$pagetitle = "My Info";
ob_start();
?>

<div id="band" class="container text-left" style="margin-top:50px" >
<h1>My Gallery</h1>
<div class="panel-body inf-content">
  <form>
    <div id="queue"></div>
    <input id="file_upload" name="file_upload" type="file" multiple="true">
  </form>

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
$(document).ready(function(){ 
  var username = '<?=$_SESSION['username']?>';
  $.ajax({  
     url:"getuserinfo.php",  
     method:"POST",  
     data: {username:username},  
     success:function(data)  
     {  
      var resultData = $.parseJSON(data);
      $('#myinfo_username').text(resultData.username);
      $('#myinfo_email').text(resultData.email);
      $('#myinfo_role').text(resultData.role);
      if(resultData.profilepic === '' || resultData.profilepic === null) {
        $('#profilepic').attr("src", "image/unknown.jpg");
      } else {
        $('#profilepic').attr("src", "upload/profilepic/" + resultData.profilepic);
      }
     }  
  });  
});
    
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
</script>
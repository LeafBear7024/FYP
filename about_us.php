
<?php
$pagetitle = "About Us";
ob_start();
?>

<!-- Page Put in Content-->
<div id="band" class="container text-left" style="margin-top:50px" >
  <div class="row">
    <div class="col-sm-8">
      <h2>About Company </h2><br>
      <h4>Nowaday, people still using social platform method to contact their photography shop or photographer to find the job are inefficiency, they need to spend a lot of time on research in job detail such as requester background, job location, time, job detail…etc. Therefore, we would like to provide a safty and convenient platform to user to create their photograghy event easily. </p>
      <br><button class="btn btn-lg btn-danger" name="business_side" id="business_side1">Become our partner</button>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>

<script type="text/javascript">
  
  document.getElementById("business_side1").onclick = function () {
        location.href = "business_side.php";
    };
</script>
<?php
//將緩衝區的內容放到變數裏面，然後清除緩衝區
$pagemaincontent = ob_get_contents();
ob_end_clean();
//套用主板頁面
include("master.php");
?>

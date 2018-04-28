<?php  
 session_start();  
require_once 'db_connect.php';
  
if(isset($_POST['clickedId']) && isset($_POST['action']) && isset($_POST['serviceproviderid'])) {
    $query = "  
    UPDATE event set response = ". $_POST['action'] .", serviceproviderid = ". $_POST['serviceproviderid']. "
    WHERE id = ". $_POST['clickedId'];  
}
$result = mysqli_query($DBcon, $query);  
echo $result;
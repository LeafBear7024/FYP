<?php  
 session_start();  
require_once 'db_connect.php';
if($_SESSION['role'] == 3) {
    if(isset($_POST['clickedId']) && isset($_POST['action'])) {
        $query = "  
        UPDATE user set systemstatus = ". $_POST['action'] ."
        WHERE id = ". $_POST['clickedId'];  
    }
} else {
    exit;
}
$result = mysqli_query($DBcon, $query);  
echo $result;
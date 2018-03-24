<?php  
 session_start();  
require_once 'db_connect.php';
if(isset($_POST['userid'])) {
    $query = "  
    UPDATE user set role = 2
    WHERE id = ". $_POST['userid'];  
} else {
    exit;
}
$result = mysqli_query($DBcon, $query);  
echo $result;
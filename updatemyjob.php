<?php  
 session_start();  
require_once 'db_connect.php';
  
if(isset($_POST['clickedId']) && isset($_POST['action'])) {
    $query = "  
    UPDATE event set response = ". $_POST['action'] ."
    WHERE id = ". $_POST['clickedId'];  
}
$result = mysqli_query($DBcon, $query);  
echo $result;
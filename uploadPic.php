<?php  
 session_start();  
require_once 'db_connect.php';
  
// $array = explode('.', $_FILES['file']['name']);
 $file_extension = strrchr($_FILES['file']['name'], ".");
 $newFileName = uniqid() . $file_extension;
//$newFileName = $_FILES['file']['name'];
if ( 0 < $_FILES['file']['error'] ) {
  echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else {
    move_uploaded_file($_FILES['file']['tmp_name'], 'upload/profilepic/' . $newFileName);
}
$query = "  
UPDATE user set profilepic = '" . $newFileName . "'
WHERE id = '".$_POST["userid"]."' 
";  
$result = mysqli_query($DBcon, $query);  
echo $result;
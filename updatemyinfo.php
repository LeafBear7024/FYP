<?php  
 session_start();  
require_once 'db_connect.php';
$changePWD = 0;
$email = $_POST['email'];
$password = $_POST['password'];
$userrole = $_POST['userrole'];
if(!empty($password)) {
    $changePWD = 1;
}

if(isset($_POST['userid'])) {
    $check_email = $DBcon->query("SELECT email FROM user WHERE email='$email' && id!=". $_POST['userid']); 
    $check_email_count = $check_email->num_rows;
    if($check_email_count == 0) {
        $query = "UPDATE user set email = '$email'";
        
        if($changePWD == 1) {
            $query .= ",password = '$password'";  
        }
        if($userrole == 2 || $userrole == 5) {
            $contact = $_POST['contact'];
            $description = $_POST['description'];
            $budget = $_POST['budget'];
            $speciality = $_POST['speciality'];
            $workingexp = $_POST['workingexp'];
            $query .= ",contact = '$contact',description = '$description',budget = '$budget',speciality = '$speciality',workingexp = '$workingexp'";  
        }
        $query .= "WHERE id = " . $_POST['userid'];  
    } else {
        echo 2;
        exit();
    }
}

$result = mysqli_query($DBcon, $query);  
echo $result;
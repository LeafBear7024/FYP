<?php  
 session_start();  

require_once 'db_connect.php';
 $connect = mysqli_connect("localhost", "root", "", "fyp");  

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $check_email = $DBcon->query("SELECT email FROM user WHERE email='$email'");

  $check_username = $DBcon->query("SELECT username FROM user WHERE username='$username'");

  $check_email_count = $check_email->num_rows;

  $check_username_count = $check_username->num_rows;
 
  // check duplicated username
  if ($check_username_count == 0) {
  	// check duplicated email
 	if($check_email_count == 0) {
 		// create account
          if(isset($_POST['role'])) {
            $contact = $_POST['contact'];
            $description = $_POST['description'];
            $budget = $_POST['budget'];
            $speciality = $_POST['speciality'];
            $workingexp = $_POST['workingexp'];
            $role = $_POST['role'];
            $query = "INSERT INTO user(username,email,password,contact,description, budget,speciality,workingexp,role) VALUES('$username','$email','$password','$contact','$description', '$budget','$speciality','$workingexp','$role')";
          } else {
              $query = "INSERT INTO user(username,email,password) VALUES('$username','$email','$password')";
          }
      	$result = mysqli_query($DBcon, $query);  
      	if($result) {
 			$msg = 1;
      	} else {
      		$msg = 4;
      	}
 	} else {
 		$msg = 3;
 	}
  } else {
  	$msg = 2;
  }
  echo $msg;
  $DBcon->close();
 ?>
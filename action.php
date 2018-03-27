<?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "fyp");  
 if(isset($_POST["username"])) {  
      $query = "  
      SELECT * FROM user  
      WHERE username = '".$_POST["username"]."'  
      AND password = '".$_POST["password"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0) {  
            while ($row = $result->fetch_assoc()) {
              if($row['systemstatus'] == 2) {
                  echo 2;
                  exit();
              } else {
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['userid'] = $row['id'];
              }
            }
            echo 1;
      } else {  
           echo 0;  
      }  
 }  
 if(isset($_POST["action"])) {  
      unset($_SESSION["role"]);  
      unset($_SESSION["username"]);  
      unset($_SESSION["userid"]);  
 }  
 ?>  

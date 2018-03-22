<?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "fyp");  
 if(isset($_POST["userid"]))  
 {  
      $query = "  
      SELECT username, email, 
      CASE WHEN role = 1 THEN 'General User'
      WHEN role = 2 THEN 'Service Provider (Paid)'
      WHEN role = 5 THEN 'Service Provider (Free Trial)'
      ELSE 'Admin' END as roleName,
      role,
      profilepic,
      contact,
      description,
      budget,
      workingexp,
      speciality,
      DATE_FORMAT(createdatetime, '%Y-%m-%d') as joindate  FROM user  
      WHERE id = '".$_POST["userid"]."' 
      ";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
                $myArray = $row;
        }
        echo json_encode($myArray);
      }  
      else  
      {  
           echo 'No';  
      }  
 }  

<?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "fyp");  
 if(isset($_POST["userid"]))  
 {  
      $query = "  
      SELECT filename from gallery
      WHERE userid = '".$_POST["userid"]."' 
      ";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      { 
          $myArray = array();
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
                array_push($myArray,$row);
        }
        echo json_encode($myArray);
      }  
      else  
      {  
           echo 'No';  
      }  
 }  

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
      speciality
      ,COALESCE(CASE 
        WHEN speciality = 1
            THEN 'Photographer'
        END, CASE 
        WHEN speciality = 2
            THEN 'MakeupArtist'
        END, CASE 
        WHEN speciality = 3
            THEN 'Fashion Shop'
        END, CASE 
        WHEN speciality = 4
            THEN 'Model'
        END, CASE 
        WHEN speciality = 5
            THEN 'Venue'
        END) AS specialityDetail
    ,COALESCE(CASE 
        WHEN workingexp = 1
            THEN '0 - 2 Years'
        END, CASE 
        WHEN workingexp = 2
            THEN '3 - 5 Years'
        END, CASE 
        WHEN workingexp = 3
            THEN '6 - 10 Years'
        END, CASE 
        WHEN workingexp = 4
            THEN '10 Years+'
        END) AS workingexpDetail
    ,COALESCE(CASE 
        WHEN budget = 1
            THEN '$0 - $1000'
        END, CASE 
        WHEN budget = 2
            THEN '$1001 - $5000'
        END, CASE 
        WHEN budget = 3
            THEN '$5001 - $10000'
        END, CASE 
        WHEN budget = 4
            THEN '$10000+'
        END) AS budgetDetail
    ,DATE_FORMAT(createdatetime, '%Y-%m-%d') as joindate  
    FROM user  
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

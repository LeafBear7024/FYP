<?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "fyp");  
 if(isset($_POST["eventID"]))  
 {  
      $query = "  
      SELECT id
	,eventName
	,eventInfo
	,eventLocation
	,eventDate
    ,COALESCE(CASE 
        WHEN eventtype = 1
            THEN 'Famiy Photography'
        END, CASE 
        WHEN eventtype = 2
            THEN 'Event Photography'
        END, CASE 
        WHEN eventtype = 3
            THEN 'Videography'
        END, CASE 
        WHEN eventtype = 4
            THEN 'Product Photography'
        END, CASE 
        WHEN eventtype = 5
            THEN 'Wedding Photography'
        END, CASE 
        WHEN eventtype = 6
            THEN 'Other'
        END) AS eventType
    ,COALESCE(CASE 
        WHEN eventbudget = 1
            THEN '$0 - $1000'
        END, CASE 
        WHEN eventbudget = 2
            THEN '$1001 - $5000'
        END, CASE 
        WHEN eventbudget = 3
            THEN '$5001 - $10000'
        END, CASE 
        WHEN eventbudget = 4
            THEN '$10000+'
        END) AS eventBudget
	,eventContact
	,serviceproviderid
	,requestedbyid
	,COALESCE(CASE 
			WHEN RESPONSE = 1
				THEN 'Pending'
			END, CASE 
			WHEN RESPONSE = 2
				THEN 'Accpeted'
			END, CASE 
			WHEN RESPONSE = 3
				THEN 'Rejected'
			END, CASE 
			WHEN RESPONSE = 4
				THEN 'Open'
			END, CASE 
			WHEN RESPONSE = 5
				THEN 'Waiting'
			END) AS response
    ,CASE WHEN systemstatus = 1 THEN 'Active' ELSE 'Inactive' END as systemstatus
FROM event t1  WHERE id = '".$_POST["eventID"]."' 
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

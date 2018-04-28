<?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "fyp");
 $eventName = $_POST['eventName'];
 $eventInfo = $_POST['eventInfo'];
 $eventLocation = $_POST['eventLocation'];
 $eventDate = $_POST['eventDate'];
 $eventType = $_POST['eventType'];
 $eventBudget = $_POST['eventBudget'];
 $eventContact = $_POST['eventContact'];
 $serviceproviderid = $_POST['serviceproviderid'];
 $requestedbyid = $_POST['requestedbyid'];
 $response = isset($_POST['response']) ? $_POST['response']: 1;
  $query = "  
  INSERT INTO event (eventName, eventInfo, eventType, eventBudget, eventLocation, eventDate, eventContact, serviceproviderid, requestedbyid, response) VALUES ('$eventName', '$eventInfo', '$eventType', '$eventBudget', '$eventLocation', '$eventDate', '$eventContact', '$serviceproviderid', '$requestedbyid', $response);
  "; 
  $result = mysqli_query($connect, $query); 
  if($result)  
  {  
    echo 1;
  }  
  else  
  {  
       echo 'No';  
  }  
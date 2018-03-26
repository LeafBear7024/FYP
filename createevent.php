<?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "fyp");
 $eventName = $_POST['eventName'];
 $eventInfo = $_POST['eventInfo'];
 $eventLocation = $_POST['eventLocation'];
 $eventDate = $_POST['eventDate'];
 $eventType = $_POST['eventType'];
 $eventContact = $_POST['eventContact'];
 $serviceproviderid = $_POST['serviceproviderid'];
 $requestedbyid = $_POST['requestedbyid'];
  $query = "  
  INSERT INTO event (eventName, eventInfo, eventType, eventLocation, eventDate, eventContact, serviceproviderid, requestedbyid) VALUES ('$eventName', '$eventInfo', '$eventType', '$eventLocation', '$eventDate', '$eventContact', '$serviceproviderid', '$requestedbyid');
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
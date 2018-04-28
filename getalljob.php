<?php
include("db_connect.php");
$query = '';
$data = array();
$records_per_page = 10;
$start_from = 0;
$current_page_number = 0;
if(isset($_POST["rowCount"]))
{
	$records_per_page= $_POST["rowCount"];
}else{
	$records_per_page = 10;
}
if(isset($_POST["current"]))
{
 $current_page_number = $_POST["current"];
}
else
{
 $current_page_number = 1;
}
$start_from = ($current_page_number - 1) * $records_per_page;

// check if that user is serviceprovider / requester
$query .= "SELECT 
     t1.id
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
    ,CASE WHEN t2.username IS NULL THEN '-' ELSE t2.username END as requestedbyname
    ,CASE WHEN t2.email IS NULL THEN '-' ELSE t2.email END as requestedbyemail
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
			WHEN RESPONSE = 4 OR RESPONSE = 6
				THEN 'Vacant'
			END, CASE 
			WHEN RESPONSE = 5
				THEN 'Waiting'
			END) AS response
    ,CASE WHEN t1.systemstatus = 1 THEN 'Active' ELSE 'Inactive' END as systemstatus
FROM event t1 LEFT JOIN user t2 ON t1.requestedbyid = t2.id WHERE requestedbyid != ". $_POST['userid'] . " AND (serviceproviderid = 0 OR response = 6) AND t1.systemstatus = 1";

if(!empty($_POST["searchPhrase"]))
{
 $query .= 'AND (t1.id LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR t1.eventName LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR t1.eventLocation LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR t1.eventDate LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR t1.eventContact LIKE "%'.$_POST["searchPhrase"].'%" ) ';
}

$order_by = '';
if(isset($_POST["sort"]) && is_array($_POST["sort"]))
{
 foreach($_POST["sort"] as $key => $value)
 {
  $order_by .= " $key $value, ";
 }
}
else
{
 $query .= ' ORDER BY t1.id DESC ';
}
if($order_by != '')
{
 $query .= ' ORDER BY ' . substr($order_by, 0, -2);
}
if($records_per_page != -1)
{
 $query .= " LIMIT " . $start_from . ", " . $records_per_page;
}

$result = mysqli_query($DBcon, $query);

$total_records = 0;
if($result) {
    while($row = mysqli_fetch_assoc($result))
    {
     $data[] = $row;
    }
    $total_records = mysqli_num_rows($result);
}

$result1 = mysqli_query($DBcon, $query);

$output = array(
 'current'  => intval($_POST["current"]),
 'rowCount'  => 10,
 'total'   => intval($total_records),
 'rows'   => $data
);

echo json_encode($output);


?>
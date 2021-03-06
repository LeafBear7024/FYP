<?php
include("db_connect.php");
if($_POST['userrole'] != 3) {
    exit;
}
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
$query .= "SELECT id
	,username
	,email
	,createdatetime
    ,contact
	,COALESCE(CASE 
			WHEN role = 1
				THEN 'Normal User'
			END, CASE 
			WHEN role = 2
				THEN 'Service Provider(Premium)'
			END, CASE 
			WHEN role = 3
				THEN 'Admin'
            END, CASE 
			WHEN role = 5
				THEN 'Service Provider(Free)'
			END) AS role
    ,CASE WHEN systemstatus = 1 THEN 'Active' ELSE 'Inactive' END as systemstatus
FROM user ";

if(!empty($_POST["searchPhrase"]))
{
 $query .= 'AND event.username LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR event.email LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR event.createdatetime LIKE "%'.$_POST["searchPhrase"].'%" ';
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
 $query .= 'ORDER BY user.id DESC ';
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

if($result) {
    while($row = mysqli_fetch_assoc($result))
    {
     $data[] = $row;
    }
}

$query1 = "SELECT * FROM user ";
$result1 = mysqli_query($DBcon, $query1);
$total_records = mysqli_num_rows($result1);

$output = array(
 'current'  => intval($_POST["current"]),
 'rowCount'  => 10,
 'total'   => intval($total_records),
 'rows'   => $data
);

echo json_encode($output);


?>
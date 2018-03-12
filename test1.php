<?php
//fetch.php
include("db_connect.php");
$query = '';
$data = array();
$records_per_page = 10;
$start_from = 0;
$current_page_number = 0;
if(isset($_POST["rowCount"]))
{
 $records_per_page = $_POST["rowCount"];
}
else
{
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
$query .= "
SELECT * FROM event ";
if(!empty($_POST["searchPhrase"]))
{
 $query .= 'WHERE (event.id LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR event.event_name LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR event.event_location LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR event.event_date LIKE "%'.$_POST["searchPhrase"].'%" ';
  $query .= 'OR event.event_contact LIKE "%'.$_POST["searchPhrase"].'%" ) ';
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
 $query .= 'ORDER BY event.id DESC ';
}
if($order_by != '')
{
 $query .= ' ORDER BY ' . substr($order_by, 0, -2);
}

if($records_per_page != -1)
{
 $query .= " LIMIT " . $start_from . ", " . $records_per_page;
}
//echo $query;
$result = mysqli_query($DBcon, $query);
while($row = mysqli_fetch_assoc($result))
{
 $data[] = $row;
}

$query1 = "SELECT * FROM event";
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
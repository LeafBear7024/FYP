<?php
//insert.php
include("db_connect.php");
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $event_name = mysqli_real_escape_string($db_connect, $_POST["event_name"]);
  $event_location = mysqli_real_escape_string($db_connect, $_POST["event_location"]);
  $event_date = mysqli_real_escape_string($db_connect, $_POST["event_date"]);
  $event_contact = mysqli_real_escape_string($db_connect, $_POST["event_contact"]);
  $query = "
   INSERT INTO event(event_name, event_location, event_date,event_contact) 
   VALUES ('".$event_name."', '".$event_location."', '".$event_date."', '".$event_contact."')
  ";
  if(mysqli_query($db_connect, $query))
  {
   echo 'Product Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {
  $category_id = mysqli_real_escape_string($connection, $_POST["category_id"]);
  $product_name = mysqli_real_escape_string($connection, $_POST["product_name"]);
  $product_price = mysqli_real_escape_string($connection, $_POST["product_price"]);
  $query = "
   UPDATE product 
   SET category_id = '".$category_id."', 
   product_name = '".$product_name."', 
   product_price = '".$product_price."' 
   WHERE product_id = '".$_POST["product_id"]."'
  ";
  if(mysqli_query($connection, $query))
  {
   echo 'Product Updated';
  }
 }
}
?>


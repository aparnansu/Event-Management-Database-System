<?php
session_start();
  require_once 'login_Aparna.php';
$message='';
$isUpdate = isset($_POST['Update_event']);
$isDelete = isset($_POST['Delete_event']);
if ($isUpdate || $isDelete)
{
  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server)
  {
    die("Unable to connect to MySQL: " . mysqli_error($db_server));
  }

  foreach($_POST as $key=>$value) ${$key}=$value;
  $userid= $_SESSION['user_id'];
  $showid=$Show_id;
  $query_string = '';
  $operation_string = '';
  if($isUpdate)
  {
    $query_string = "UPDATE Shows SET Show_name='$Show_name',Venue='$Venue',Start_time='$Start_time',End_time='$End_time',
                  Show_description='$show_description',
                  Ticket_price='$price',Show_type='$Show_type'
                  WHERE Show_id='$Show_id'";
    $operation_string = 'updated';
  }
  else if($isDelete)
  {
    $query_string = "DELETE FROM Shows WHERE Show_id='$showid'";
    $operation_string = 'deleted';
  }

  $query_result = mysqli_query($db_server,$query_string);
  if($query_result)
  {
    $message="<div class='alert alert-success'>The event has been ".$operation_string." successfully</div>";
    //echo"Update success";
  }
  else {
    //echo "Update not working";
    $message='Operation failed';
  }
}

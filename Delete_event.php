<?php
session_start();
  require_once 'login_Aparna.php';

  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

  foreach($_POST as $key=>$value) ${$key}=$value;
$userid= $_SESSION['user_id'];
$showid=$Show_id;
$delete_query = mysqli_query($db_server,"DELETE FROM Shows WHERE Show_id='$showid'");
if($delete_query)
{
  echo"The event has been deleted";
}

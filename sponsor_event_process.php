<?php
session_start();
  require_once 'login_Aparna.php';

  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
if (isset($_POST['Sponsor'])){
  foreach($_POST as $key=>$value) ${$key}=$value;
  //echo "Got the values";
  /*foreach ($_POST as $entry)
{
     print $entry . "<br>";
}*/
  //echo $Show_name;
  //echo $Venue;
  //echo $Show_description;
  $find_show_id= "SELECT Show_id FROM Shows WHERE Show_name='$Show_name';";
  $result = mysqli_query($db_server, $find_show_id);
  $show_id=mysqli_fetch_object($result);
  $value=$show_id->Show_id;
  //echo "show id retrieved";
  $userid= $_SESSION['user_id'];
  //echo $userid;
  if($result)
  {
  $sql = "INSERT INTO Sponsors(sponsor_user_id,sponsor_show_id,sponsor_amount,company_name,sponsor_type) VALUES('{$_SESSION['user_id']}',(SELECT Show_id FROM Shows WHERE Show_name='$Show_name'),'$sponsor_amount','$company_name','$sponsor_type');";
}
$result2 = mysqli_query($db_server, $sql);
  //if($result) echo "INSERT success!<br />"; else echo "INSERT failed!<br />";

  if($result2)
  {
    //Multiple lines of code should be wrapped in curly braces
    //echo "<p>Data was successfully INSERTED to the database.</p>";
    $message='<div class="alert alert-success">You are now a sponsor for the event!!!</div>';
  }
  else
  {
    //echo "<p>Your INSERT failed and here's why:</p>";
    $message='<div class="alert alert-danger">Sorry, could not add you as a sponsor</div>';
    die(mysqli_error($db_server));
  }
}

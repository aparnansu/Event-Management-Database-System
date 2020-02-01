<?php
session_start();
  require_once 'login_Aparna.php';

  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
if (isset($_POST['Perform'])){
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
$check_query="SELECT * FROM Performers WHERE performer_user_id='$userid' AND performer_show_id='$value'";
$check_query_result=mysqli_query($db_server,$check_query);
$performer=mysqli_fetch_assoc($check_query_result);
if($performer)//exists
{ $message='<div class="alert alert-danger">Sorry, you are already registered as a performer for this event </div>'; 
}

  else
  {
  $sql = "INSERT INTO Performers(performer_user_id,performer_show_id) VALUES('{$_SESSION['user_id']}',(SELECT Show_id FROM Shows WHERE Show_name='$Show_name'));";

  $result2 = mysqli_query($db_server, $sql);
  //if($result) echo "INSERT success!<br />"; else echo "INSERT failed!<br />";

  if($result2)
  {
    //Multiple lines of code should be wrapped in curly braces
    //echo "<p>Data was successfully INSERTED to the database.</p>";
    $message='<div class="alert alert-success">You have been added as a performer for the event!!!</div>';

  }
  else
  {
    $message='<div class="alert alert-danger">Sorry, could not add you as a performer</div>';
    //echo "<p>Your INSERT failed and here's why:</p>";
    die(mysqli_error($db_server));
  }
}
}

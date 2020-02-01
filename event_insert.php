<?php
  session_start();
  $ename="";
  $venue="";
  $showdesc="";
  $capacity="";
  $ticketprice="";
  $errors = array();
  require_once 'login_Aparna.php'; // Change this to the file name with your name

  //Create the connection to the MySQL database
  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
    foreach($_POST as $key=>$value) ${$key}=$value;
  //$_POST is the ARRAY containing all HTML data that is sent to POST method
if (isset($_POST['submit_event'])){
  if (empty($ename)) {
    array_push($errors, "Please enter event name");
  }
  if (empty($venue)) {
    array_push($errors, "Please enter venue for event");
  }
  if (empty($starttime)) {
    array_push($errors, "Please enter the start time");
  }

  if (empty($endtime)) {
    array_push($errors, "Please enter end time");
  }
  if (empty($showdesc)) {
    array_push($errors, "Please enter show description");
  }
  if (empty($capacity)) {
    array_push($errors, "Please enter capacity of attendees");
  }
  if (empty($ticketprice)) {
    array_push($errors, "Please enter ticketprice");
  }

//Store each POST key/value pair in a PHP variable

  $showdesc=$_POST['showdesc'];
$Show_type= $_POST['Show_type'];
$userid= $_SESSION["user_id"];

echo "$errors[0]";

if (!($errors))
{ //echo "Executing query";
$sql = "INSERT INTO Shows(Show_name, Venue, Start_time,End_time,Show_description,Capacity,Show_mgr_id,Ticket_price,Show_type)
        VALUES ('$ename', '$venue','$starttime','$endtime','$showdesc','$capacity','$userid','$ticketprice','$Show_type');";
  //echo $ename
  //echo "Sql statement is $sql";
	$result = mysqli_query($db_server, $sql);
  //Check if the query was successfully executed: if the result is NOT FALSE
  //if($result) echo "INSERT success!<br />"; else echo "INSERT failed!<br />";

  if($result)
  {
    //Multiple lines of code should be wrapped in curly braces
    //echo "Event created successfully";
    $message='<div class="alert alert-success">The event has been created and you are assigned the manager for the event!!!
    </div>';
    //echo $message;
    //header('location: View_events.php');
    //echo "<p>Data was successfully INSERTED from the database.</p>";
  }
  else
  {
    //echo "<p>Your INSERT failed and here's why:</p>";
    $message='<div class="alert alert-danger">Sorry, there was a problem in creating the event</div>';
    die(mysqli_error($db_server));
  }
}
}
?>

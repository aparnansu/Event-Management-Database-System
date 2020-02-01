<?php
session_start();
  require_once 'login_Aparna.php';
  $message='';

  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
  if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
if (isset($_POST['participate_event'])){
  foreach($_POST as $key=>$value) ${$key}=$value;
  //echo "Got the values";
  /*foreach ($_POST as $entry)
{
     print $entry . "<br>";
}*/

  $find_show_id= $Show_id;
  $userid= $_SESSION['user_id'];
  //echo $userid;

  $capacity_value=mysqli_query($db_server,"SELECT Capacity FROM Shows WHERE Show_id='$Show_id'");
  //echo "query executed";
  //$actual_capacity=mysqli_query($db_server, $capacity_value);
  $act_cap=mysqli_fetch_row($capacity_value);
//echo $act_cap[0];
$filled_capacity_query=mysqli_query($db_server,"SELECT SUM(No_of_tickets) AS sum_tickets FROM Attendees GROUP BY Attendee_show_id HAVING Attendee_show_id='$Show_id'");
$filled_capacity_row=mysqli_fetch_row($filled_capacity_query);
//echo "filled capacity:";
//echo $filled_capacity_row[0];
$booked_tickets=$filled_capacity_row[0];
$actual_capacity=$act_cap[0];
if($actual_capacity<$booked_tickets)
{

//echo "Can't book";
  $sql ="INSERT INTO Waitlist(W_user_id,W_show_id) VALUES('{$_SESSION['user_id']}','$Show_id')";
  $result1=mysqli_query($db_server,$sql);

  //$message.='data';
  //echo "condition met";
  //if($sql)
  //  $message.='Data added to waitlist table';
}

else {
//echo "Entering else loop";
  $sql = "INSERT INTO Attendees(Attendee_user_id,Attendee_show_id,No_of_tickets) VALUES('{$_SESSION['user_id']}','$Show_id','$no_of_tickets');";
  $result2 = mysqli_query($db_server, $sql);
//  echo"Tickets successfully booked for the event";
}
if($result2)
{
  //Multiple lines of code should be wrapped in curly braces
  //echo "<p>Data was successfully INSERTED to the database.</p>";
  $message='<div class="alert alert-success">Tickets successfully booked for the event!!!</div>';
}
else if($result1){
  $message= '<div class="alert alert-success">Tickets not available.You have been added to waitlist for this event</div>';
}
else
{
  //echo "<p>Your INSERT failed and here's why:</p>";
  $message='<div class="alert alert-danger">Sorry, could not book tickets for this event</div>';
  die(mysqli_error($db_server));
}


}
//while($filled_cap=mysqli_fetch_row($filled_capacity))
//{echo "true";}
//echo "Sum=".$filled_cap['sum_tickets'];

//if($act_cap<$filled_capacity)
//{echo "You have been waitlisted for this event";}

/*
  if($result)
  {
  $sql = "INSERT INTO Attendees(Attendee_user_id,Attendee_show_id,No_of_tickets) VALUES('{$_SESSION['user_id']}',(SELECT Show_id FROM Shows WHERE Show_name='$Show_name'),'$no_of_tickets');";
}
$result2 = mysqli_query($db_server, $sql);
  //if($result) echo "INSERT success!<br />"; else echo "INSERT failed!<br />";

  if($result2)
  {
    //Multiple lines of code should be wrapped in curly braces
    echo "<p>Data was successfully INSERTED to the database.</p>";
  }
  else
  {
    echo "<p>Your INSERT failed and here's why:</p>";
    die(mysqli_error($db_server));
  } */

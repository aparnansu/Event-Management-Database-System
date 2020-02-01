<?php
  session_start();
  $username = "";
  $firstname= "";
  $lastname="";
  $Contact_no="";
  $gender="";
  $message='';
  $errors = array();
  require_once 'login_Aparna.php'; // Change this to the file name with your name
//$message="Hello";

if (isset($_POST['reg_user'])){
    //$message.= 'inside1';
    foreach($_POST as $key=>$value) ${$key}=$value;
    //$message.='test';


    if (empty($username)) { array_push($errors, "Username is required"); }

    if (empty($firstname)) { array_push($errors, "Firstname is required"); }

    if (empty($lastname)) { array_push($errors, "Lastname is required"); }

    if (empty($Contact_no)) { array_push($errors, "Contact no is required"); }

    if (empty($password_1)) { array_push($errors, "Password is required"); }

    if ($password_1 != $password_2) {
	     array_push($errors, "The two passwords do not match");
     }

//$message.='inside2';


 $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
 if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
  $user_check_query = "SELECT * FROM Users WHERE Email_id='$username' LIMIT 1";
  $exists = mysqli_query($db_server, $user_check_query);

  $user = mysqli_fetch_assoc($exists);

  if ($user) { // if user exists
    if ($user['Email_id'] === $username) {
      array_push($errors, "Username already exists");
    }}
//$message.='inside3';


if (count($errors) == 0) {
    $sql = "INSERT INTO Users (Email_id,First_name,Last_name,Contact_no,Gender,Password)
          VALUES ('$username', '$firstname', '$lastname','$Contact_no','$gender','$password_1');";
	$result = mysqli_query($db_server, $sql);
  $query = "SELECT * FROM Users WHERE Email_id='$username' AND Password='$password'";
  $results = mysqli_query($db_server, $query);
  $row=mysqli_fetch_assoc($results);
//$message.='inside4';
  //if($result) echo "INSERT success!<br />"; else echo "INSERT failed!<br />";

  if($result)
  { //echo"event added";
    //$message="event registered";
    $message='<div class="alert alert-success">You have been registered successfully.Please sign in to continue</div>';
      //Multiple lines of code should be wrapped in curly braces
        //echo "<p>Data was successfully INSERTED to the database.</p>";
  }
  else
  {
    $message .= "<p>Your INSERT failed and here's why:</p>";
    die(mysqli_error($db_server));
  }
  $_SESSION['username'] = $username;
  $_SESSION['user_id']=$row[Id];
  $_SESSION['success'] = "You are now logged in";

  //echo "You have been registered successfully.Please login";

  //header('location: login_page.php');
//  exit;
}
}
else {
  $message.='Could not login for some reason';
}
?>

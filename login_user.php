<?php
session_start();
//include('errors.php');
$username = "";
$password="";
$errors = array();
require_once 'login_Aparna.php'; // Change this to the file name with your name

$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db_server, $_POST['username']);
  $password = mysqli_real_escape_string($db_server, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  //echo "The array size is".sizeof($errors);
  if (count($errors) == 0) {

  	$query = "SELECT * FROM Users WHERE Email_id='$username' AND Password='$password'";
  	$results = mysqli_query($db_server, $query);
    $row=mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['user_id']=$row[Id];
  	  $_SESSION['success'] = "You are now logged in";
      //echo "Login success:".$_SESSION["user_id"].".";
  	  header('location: login_success_page.php');

  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>

<?php
  session_start();
    //echo "Login success:".$_SESSION["user_id"].".";
    //echo "Login success:".$_SESSION["username"].".";
?>

<html>
  <head>
    <title>Login_success</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div class="topnav-right">
        <a href="logout.php">Logout</a>
      </div>

  </head>

  <body>
    <div class="header">
      <h2>Event Management System</h2>
      </div>
<form>

      <button type="button" onclick="location.href='Create_event_page.php'" class="btn" name="create_event">Create an event</button><br><br>
  	  <button type="button" onclick="location.href='Participate_event_page.php'" class="btn" name="participate_event">Attend an event</button><br><br>
      <button type="button" onclick="location.href='perform_event_page.php'" class="btn" name="perform_event">Perform in an event</button><br><br>
      <button type="button" onclick="location.href='sponsor_event.php'" class="btn" name="sponsor_event">Sponsor an event</button><br><br>
      <button type="button" onclick="location.href='View_events.php'" class="btn" name="View managing events">View managing events</button><br><br>
      <button type="button" onclick="location.href='view_sponsoring_events.php'" class="btn" name="View sponsoring events">View sponsoring events</button><br><br>
      <button type="button" onclick="location.href='view_performing_events.php'" class="btn" name="View performing events">View performing events</button><br><br>
      <button type="button" onclick="location.href='view_attending_events.php'" class="btn" name="View attending events">View attending events</button><br><br>

  </form>
  </body>

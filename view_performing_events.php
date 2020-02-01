<?php
session_start();
 ?>

<html>
	<head>
	<title>
		View all events
  	</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div class="topnav-right">
      <a href="login_success_page.php">Return to options</a><br>
        <a href="logout.php">Logout</a>
      </div>


  </head>
	<body>

  <!-- HTML code can reside ABOVE and BELOW the starting and closing PHP tags -->

	<?php
	/*$uid = $_SESSION['user_id'];
	echo "User id is ".$uid;

	foreach ($_SESSION as $key=>$value)
	{
		echo "Key=".$key." value=".$value;
		echo "<br>";
	}*/
		require_once 'login_Aparna.php'; // Change this to the file name with your name

		//Create the connection to the MySQL database
		$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

    $userid= $_SESSION['user_id'];

    $sql= "SELECT Show_id,Show_name,Venue,Start_time,End_time,Show_description,Ticket_price,Show_type FROM Shows
            s INNER JOIN Performers p ON p.performer_show_id=s.Show_id WHERE p.performer_user_id='$userid';";

    $result = mysqli_query($db_server, $sql);



		//As we have already connected to the database, execute the query stored in the $sql variable

		//Check if the query was successfully executed: if the result is NOT FALSE
		//if($result)
			//echo "SELECT query successful!</br></br>";
		//else
			//die("SELECT query failed</br></br>");


		//More advanced logic can also be done based on success or failure
		if(mysqli_num_rows($result)>0)
		{
			//Start a table
			echo "<table id='myTable',cellspacing='1'>";
      echo "<tr><th>Show name</th><th>Venue</th><th>Start_time</th><th>End_time</th><th>Show_description</th><th>Show_type</th></tr>";
			while($row=mysqli_fetch_assoc($result))
			{
				//Store each SQL row's column name/value pair in a PHP variable
				foreach($row as $key=>$value) ${$key}=$value;

				//Construct a table row where <td> = table division, i.e. a single column
				echo "<tr onclick='javascript:showRow(this);'><td style=\"display:none;\">$Show_id</td><td>$Show_name</td><td>$Venue</td><td>$Start_time</td><td>$End_time</td><td>$Show_description</td><td>$Show_type</td></tr>";
			}

			//End the table
			echo "</table>";
      echo "<br><br>";

					}

          else {
            echo "Currently you are not performing in any of the events";

              }

?>

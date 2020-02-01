<?php include('participate_event_process.php') ?>
<html>
	<head>
	<title>
		Participate in  events
  	</title>
		<h1>Select an event that you want to attend</h1>
    <link rel="stylesheet" type="text/css" href="style.css">
		<div class="topnav-right">
				<a href="login_success_page.php">Return to options</a><br>
				<a href="logout.php">Logout</a>
			</div>

    <script language="javascript" type="text/javascript">
    function showRow(row)
{
var x=row.cells;
document.getElementById("Show_id").value = x[0].innerHTML;
//alert("id is saved"+document.getElementById("Show_id").value);
document.getElementById("Show_name").value = x[1].innerHTML;
document.getElementById("Venue").value = x[2].innerHTML;
document.getElementById("Start_time").value = x[3].innerHTML;
document.getElementById("End_time").value = x[4].innerHTML;
document.getElementById("ticket_price").value = x[6].innerHTML;
}
    </script>

	</head>
	<body>
		<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
								<?php echo $message; ?>
						</div>
				</div>

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

		$sql = "SELECT Show_id,Show_name,Venue,Start_time,End_time,Show_description,Ticket_price,Show_type FROM Shows;";

		//echo "Query executed successfully";

		//As we have already connected to the database, execute the query stored in the $sql variable
		$result = mysqli_query($db_server, $sql);

		//Check if the query was successfully executed: if the result is NOT FALSE
		//if($result)
			//echo "SELECT query successful!</br></br>";
		//else
			//die("SELECT query failed</br></br>");


		//More advanced logic can also be done based on success or failure
		if($result)
		{
			//Start a table
			echo "<table id='myTable',cellspacing='1'>";
      echo "<tr><th>Show name</th><th>Venue</th><th>Start_time</th><th>End_time</th><th>Show_description</th><th>Ticket_price</th><th>Show_type</th></tr>";
			while($row=mysqli_fetch_assoc($result))
			{
				//Store each SQL row's column name/value pair in a PHP variable
				foreach($row as $key=>$value) ${$key}=$value;

				//Construct a table row where <td> = table division, i.e. a single column
				echo "<tr onclick='javascript:showRow(this);'><td style=\"display:none;\">$Show_id</td><td>$Show_name</td><td>$Venue</td><td>$Start_time</td><td>$End_time</td><td>$Show_description</td><td>$Ticket_price</td><td>$Show_type</td></tr>";
			}

			//End the table
			echo "</table>";
      echo "<br><br>";

					}


	?>
  <form method="post" action="Participate_event_page.php">
		<div class="input-group">

				<input type="hidden" id="Show_id" name="Show_id" />
			</div>
		<div class="input-group">

			<label> Show name </label>
				<input type="text" id="Show_name" name="Show_name" />
			</div>
			<div class="input-group">
				<label> Venue </label>
				<input type="text" id="Venue" />
			</div>
			<div class="input-group">
				<label> Start time </label>
				<input type="datetime-local" id="Start_time" name="Start_time" />
			</div>
			<div class="input-group">
				<label> End time </label>
				<input type="datetime-local" id="End_time" name="End_time" />
			</div>
			<div class="input-group">
				<label> Ticket price </label>
				<input type="number" id="ticket_price" name="ticket_price"/>
			</div>
			<div class="input-group">
				<label>No of tickets </label>
				<input type="number" id="no_of_tickets" name="no_of_tickets" required placeholder="Enter the no of tickets"/>
			</div>
			<div class="input-group">
			    <button type="submit" class="btn" name="participate_event">Participate</button>
			  </div>

</form>
  <!-- HTML code can reside ABOVE and BELOW the starting and closing PHP tags -->
	</body>
</html>

<?php include('Update_event.php');
session_start();
 ?>

<html>
	<head>
	<title>
		View all events
  	</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  <? if($userid){
  echo  "<div class='topnav-right'>
        <a href='logout.php'>Logout</a>
      </div>";
} ?>

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
  document.getElementById("show_description").value = x[5].innerHTML;
  document.getElementById("price").value = x[6].innerHTML;
  document.getElementById("Show_type").value = x[7].innerHTML;
  }
      </script>
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

    $sql= "SELECT Show_id,Show_name,Venue,Start_time,End_time,Show_description,Ticket_price,Show_type FROM Shows";
    if($userid!= NULL)
    {
      $sql = $sql .
              " WHERE Show_mgr_id='$userid';";

    }

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
      if($userid!=NULL){
        echo
        "<form method='post' action='View_events.php'>
        <div class='input-group'>
              <input type='hidden' id='Show_id' name='Show_id' />
            </div>
            <div class='form-group'>
        						<div class='col-sm-10 col-sm-offset-2'>
		                    $message
                        </div>
        				</div>
            <div class='input-group'>
            Event name <input type='text' id='Show_name' name='Show_name' />
            </div>
            <div class='input-group'>
            Venue  <input type='text' id='Venue' name='Venue'/>
            </div>
              <div class='input-group'>
              Start time <input type='datetime-local' id='Start_time' name='Start_time'/>
            </div>
          <div class='input-group'>
          End time <input type='datetime-local' id='End_time' name='End_time'/>
          </div>
            <div class='input-group'>
            Show description  <input type='text' id='show_description' name='show_description'/>
            </div>
            <div class='input-group'>
            Ticket price  <input type='number' id='price' name='price' />
            </div>
            <div class='input-group'>
              <select name='Show_type' id='Show_type'>
              <option value='Cultural' selected>Cultural</option>
              <option value='Business'>Business</option>
              <option value='Workshop'>Workshop</option>
              <option value='Seasonal'>Seasonal</option>
              <option value='Film and media'>Film and media</option>
              <option value='Team Building'>Team Building</option>
              </select>
              </div>
            <div class='input-group'>
                <button type='submit' class='btn' name='Update_event'>Update</button>
              </div>
              <div class='input-group'>
                  <button type='submit' class='btn' name='Delete_event'>Delete</button>
                </div>
            </form>
        </body>";
      }

					}

    else {
      echo "Currently you are not manager of any of the events";

        }


?>

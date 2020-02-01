<?php include('event_insert.php') ?>
<html>
	<head>
	<title>
		Create_event_page
	</title>
  <link rel="stylesheet" type="text/css" href="style.css">
	<!-- datepicker include begin-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
	<!-- datepicker include end-->
	<div class="topnav-right">
			<a href="logout.php">Logout</a><br>
			<a href="login_success_page.php">Return to options</a>
		</div>
    <h1 style="font-family:verdana; color:#ffac33;text-align:center"> Create Event </h1>
    <style type = "text/css">
      body {
          font-family:Arial, Helvetica, sans-serif;
          font-size:14px;
       }
       label {
          font-weight:bold;
          width:100px;
          font-size:14px;
       }
       .box {
          border:#666666 solid 1px;
       }
      </style>
	</head>
	<body>
		<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
								<?php echo $message; ?>
						</div>
				</div>
		<form method="POST" action="Create_event_page.php">
<?php include('errors.php'); ?>
      <div class="input-group">
				<label>Event Name</label>
			  <input type="text" name="ename"/>
      </div>
        <div class="input-group">
				<label>Venue</label>
        <input type="text" name="venue"/>
				</div>
				<div class="input-group">
					<label>Start date and time</label>
					<input class="date-picker" name="starttime" type="text" placeholder="Start date" readonly="readonly">
        </div>
				</br>
        <div class="input-group">
      	<label>End date and time</label>
          <input class="date-picker" name="endtime" type="text" placeholder="End date" readonly="readonly">
        </div>
        <div class="input-group">
				<label>Show description</label>
				<textarea name="showdesc" rows="5" cols="40">
				<?php echo $showdesc; ?></textarea>
				</div>
        <div class="input-group">
				 <label>Capacity</label>
          <input type="number" name="capacity"/></br>
        </div>
        <div class="input-group">
      	<label>Ticket price</label>
        <input type="number" name="ticketprice"/></br>
        </div>
        <div class="input-group">
					<label>Show type</label>
					<select name="Show_type">
   					<option value="Cultural" selected>Cultural</option>
   					<option value="Business">Business</option>
   					<option value="Workshop">Workshop</option>
   					<option value="Seasonal">Seasonal</option>
						<option value="Film and media">Film and media</option>
						<option value="Team building">Team building</option>
 						</select>
          </div>
          <div class="input-group">
        	  <button type="submit" class="btn" name="submit_event">Submit</button>
        	</div>

        </form>
				<!-- datepicker include begin-->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
			  <script type="text/javascript">
			  	$( '.date-picker' ).flatpickr({
				enableTime: true,
				//defaultDate: new Date(),
			    dateFormat: "Y-m-d H:i:ss",
					time_24hr: true,
					//defaultHour: 12,
          //defaultMinute: 00,
					//enableTime: true,
					minDate: "today",
					//minTime: Date.now(),
			  });
			  </script>
				<!-- datepicker include end-->
	</body>
</html>

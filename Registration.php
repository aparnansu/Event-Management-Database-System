<?php include('register.php') ?>
<html>

   <head>
      <title>Registration Page</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <h1 style="font-family:verdana; color:#ffac33;text-align:center" > Event Management System </h1><br><br>
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
    <form method="post" action="Registration.php">
      <?php include('errors.php'); ?>
        	<div class="input-group">
  	  <label>Username[Email address]</label>
  	  <input type="email" name="username" value="<?php echo $username; ?>"required placeholder="Enter a valid email address">
  	</div>
    <div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="firstname" pattern="[A-Za-z]{1,50}">
  	</div>
    <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lastname" pattern="[A-Za-z]{1,50}">
  	</div>
    <div class="input-group">
      <label>Contact no</label>
      <input type="number" name="Contact_no">
    </div>
    <div style="text-align:left">
      <label>Gender</label>
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="female">Female
    </div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login_page.php">Sign in</a>
  	</p>
    <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <?php echo $message; ?>
            </div>
        </div>
  </form>
</body>
</html>

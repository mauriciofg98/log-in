<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="projectlocation.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>project name</label>
  	  <input type="text" name="Project_Address">
  	</div>
  	<div class="input-group">
  	  <label>location name</label>
  	  <input type="text" name="Project_Location_Name">
  	</div>
  	<div class="input-group">
  	  <label>zipcode</label>
  	  <input type="number" name="Project_ZIP">
  	</div>
  	<div class="input-group">
  	  <label>City</label>
  	  <input type="text" name="Project_Location_City">
  	</div>
    <div class="input-group">
      <label>County</label>
      <input type="text" name="Project_Location_County">
    </div>
      <div class="input-group">
      <label>Region ID</label>
      <input type="number" name="Region_ID">
    </div>



  	<div class="input-group">
  	  <button type="submit" class="btn" name="projectloc">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
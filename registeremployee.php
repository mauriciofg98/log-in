<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<a href="/log-in/deleteemployee.php">Remove an Employee</a>

  <div class="header">
  	<h2>Register Employee</h2>
  </div>
	
  <form method="post" action="registeremployee.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Full Name:</label>
  	  <input type="text" name="Employee_Name">
  	</div>
  	<div class="input-group">
  	  <label>Email:</label>
  	  <input type="email" name="Employee_Email" >
  	</div>
  	<div class="input">
  	  <label>Gender:</label><br>
      <input type="radio" name="Employee_Gender" value="1">Male<br>
      <input type="radio" name="Employee_Gender" value="0">Female<br>
  	</div>
  	<div class="input-group">
  	  <label>Age:</label>
  	  <input type="number" name="Employee_Age" min="18" max="99">
  	</div>
    <div class="input-group">
      <label>Date of Birth:</label>
      <input type="date" name="Employee_DOB">
    </div>

    <div class="input-group">
      <label>Race:</label>
       <select class="input-group" name="Employee_Race">
          <option value="American Indian">American Indian</option>
          <option value="Alaskan Native"> Alaskan Native</option>
          <option value="African American">African American</option>
          <option value="Hispanic or Latino">Hispanic or Latino</option>
           <option value="Native Hawaiin or other pacific islander ">Native Hawaiin or other pacific islander </option>
           <option value="White">White</option>
         <option value="N/A" selected>N/A</option>
       </select>
    </div>

    </div>
    <div class="input-group">
      <label>Social Security Number:</label>
       <input type="number" name="Employee_Social">
    </div>
    <div class="input-group">
      <label>Address:</label>
      <input type="text" name="Employee_Address">
    </div>
      <div class="input-group">
      <label>Phone Number:</label>
      <input type="number" name="Employee_Phone">
    </div>
      <div class="input-group">
      <label>Work Description:</label>
      <input type="text" name="Employee_Work_Description">
    </div>
      <div class="input-group">
      <label>Project ID:</label>
      <input type="number" name="Project_ID">
    </div>
      <div class="input-group">
      <label>Username:</label>
      <input type="text" name="User_Login">
    </div>
      <div class="input-group">
        <label>Today's Date:</label>
         <input type="Date" name="Employed_Date">
    </div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_employee">Register</button>
  	</div>

  	<p>
  		Already an employee? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
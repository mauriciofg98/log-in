<?php include('server.php') ?>
<!DOCTYPE html>
 <html>
 <head>
   <title>Delete Employee</title>
 </head>
 <body>

<div class="header">
  <h2>Delete Employee</h2>
</div>  
 

<form method="post" action="deleteemployee.php">
  <?php include('errors.php'); ?>

<div class="input-group">
      <label>Enter the employee ID to delete:</label>
      <input type="number" name="Employee_ID">
    </div>

    <div class="input-group">
      <button type="submit" class="btn" name="deleteemp">Register</button>
    </div>'

</form>
 </body>
 </html> 
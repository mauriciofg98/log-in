<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Successful Registration</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3"><br><br>
            <h2 style="color:#0fad00">Success</h2>
<?php
$sql = "SELECT ID, Name FROM Employee WHERE ID=(SELECT max(ID) FROM Employee )";
$result = $db->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<h3>" . $row["Name"]. "</h3><br>";
    }
}
else{
    echo "0 results";
}


?>
    <p style="font-size:20px;color:#5C5C5C;">Thank you for registering with us today, this is your ID:</p>
<?php
$sql = "SELECT ID FROM Employee WHERE ID=(SELECT max(ID) FROM Employee )";
$ID;
$result = $db->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<h3>" . $row["ID"]. "</h3><br>";
        $ID = $row["ID"];
    }
}
else{
    echo "0 results";
}
  $race = mysqli_real_escape_string($db, $_REQUEST['Race']);
  $gender = mysqli_real_escape_string($db, $_REQUEST['Gender']);
  $age = mysqli_real_escape_string($db, $_REQUEST['Age']);
  $email = mysqli_real_escape_string($db, $_REQUEST['email']);
  $phone = mysqli_real_escape_string($db, $_REQUEST['phone']);
  $address = mysqli_real_escape_string($db, $_REQUEST['address']);
  $sql = "INSERT INTO contact ( ID, email, phone, address) VALUES ('$ID', '$email', '$phone', '$address')";
  if(mysqli_query($db, $sql)){}
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
$sql = "INSERT INTO Demographics ( ID, Race, Gender, Age) VALUES ('$ID', '$race', '$gender', '$age')";
if(mysqli_query($db, $sql)){}
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
?>
            <p style="font-size:20px;color:#5C5C5C;">Use This ID number to Login.</p>
            <a href="liscreen.php" class="btn btn-success">Login</a><br><br>
        </div>
    </div>
</div>
<br>
<a href="reg.php" class="btn btn-success">Go to Register Page</a><br><br>
<a href="clockpage.php" class="btn btn-success">Go to Clock-In Page</a><br><br>
</body>
</html>
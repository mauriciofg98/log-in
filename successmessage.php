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
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Success</h2>
        <h3>Dear, ( full name)</h3><!-- input name from DB here -->

<?php
$servername = "localhost";
$username = "gfonsec2";
$password = "LuckyFonsec1";
$dbname = "clock";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, Name FROM Employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Thank you " . $row["Name"]. " for registering with us today, this is your ID: " . $row["ID"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>


        <p style="font-size:20px;color:#5C5C5C;">Thank you for registering with us today, this is your ID:(Employees ID).</p>
        <a href="liscreen.php" class="btn btn-success">     Log in      </a>
    <br><br>
        </div>
        
	</div>
</div>

</body>
</html>
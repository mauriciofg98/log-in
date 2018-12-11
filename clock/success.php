<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Success Message</title>
</head>
<body>
	<h1>You are now a Employee. Here is your Employee ID:</h1>

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

$sql = "SELECT ID, Name, Age FROM Employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID"]. " - Name: " . $row["Name"]. " " . $row["Age"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
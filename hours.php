<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<style>
    .welcome{
        font-size:20px;
        color:#5C5C5C;
    }
</style>

<?php
if($_GET['ID']){
        $logged = $_GET['ID'];
    }
    else{
    echo "No value received.";
    }
//Create connection
$conn = mysqli_connect('localhost:3307', 'gfonsec2', 'LuckyFonsec1;', 'clock');
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Name FROM Employee WHERE ID=$logged";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo "<div class=welcome><center><b>Welcome back " . $row['Name'] . " here is your schedule for this week.</b></center></div>";
}
}

$sql = "SELECT ID, Monday_Ci, Monday_Co, Tuesday_Ci, Tuesday_Co, Wednesday_Ci, Wednesday_Co, Thursday_Ci, Thursday_Co, Friday_Ci, Friday_Co, Saturday_Ci, Saturday_Co, Sunday_Ci, Sunday_Co FROM Week";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Monday-in: " . $row['Monday_Ci'] . "<br>Monday-out: " . $row['Monday_Co'] . "<br>Tuesday-in: " . $row['Tuesday_Ci'] . "<br>Tuesday-out: " . $row['Tuesday_Co'] . "<br>Wednesday-in: " . $row['Wednesday_Ci'] . "<br>Wednesday-out: " . $row['Wednesday_Co'] . "<br>Thursday-in: " . $row['Thursday_Ci'] . "<br>Thursday-out: " . $row['Thursday_Co'] . "<br>Friday-in: " . $row['Friday_Ci'] . "<br>Friday-out: " . $row['Friday_Co'] . "<br>Saturday-in: " . $row['Saturday_Ci'] . "<br>Saturday-out: " . $row['Saturday_Co'] . "<br>Sunday-in: " . $row['Sunday_Ci'] . "<br>Sunday-out: " . $row['Sunday_Co'] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
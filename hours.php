<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Weekly Hours</title>
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
$sql = "SELECT Name FROM Employee WHERE ID=$logged";
$result = $db->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo "<div class=welcome><center><b>Welcome back " . $row['Name'] . " here are your Clock-In and Clock-Out times for this week.</b></center></div>";
	}
}
$sql = "SELECT ID, Monday_Ci, Monday_Co, Tuesday_Ci, Tuesday_Co, Wednesday_Ci, Wednesday_Co, Thursday_Ci, Thursday_Co, Friday_Ci, Friday_Co, Saturday_Ci, Saturday_Co, Sunday_Ci, Sunday_Co FROM Week WHERE ID=$logged";
$result = $db->query($sql);
if ($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()){
        echo "Monday-in: " . $row['Monday_Ci'] . "<br>Monday-out: " . $row['Monday_Co'] . "<br>Tuesday-in: " . $row['Tuesday_Ci'] . "<br>Tuesday-out: " . $row['Tuesday_Co'] . "<br>Wednesday-in: " . $row['Wednesday_Ci'] . "<br>Wednesday-out: " . $row['Wednesday_Co'] . "<br>Thursday-in: " . $row['Thursday_Ci'] . "<br>Thursday-out: " . $row['Thursday_Co'] . "<br>Friday-in: " . $row['Friday_Ci'] . "<br>Friday-out: " . $row['Friday_Co'] . "<br>Saturday-in: " . $row['Saturday_Ci'] . "<br>Saturday-out: " . $row['Saturday_Co'] . "<br>Sunday-in: " . $row['Sunday_Ci'] . "<br>Sunday-out: " . $row['Sunday_Co'] . "<br>";

$monday = strtotime($row['Monday_Co']) - strtotime($row['Monday_Ci']);
$tuesday = strtotime($row['Tuesday_Co']) - strtotime($row['Tuesday_Ci']);
$wednesday = strtotime($row['Wednesday_Co']) - strtotime($row['Wednesday_Ci']);
$thursday = strtotime($row['Thursday_Co']) - strtotime($row['Thursday_Ci']);
$friday = strtotime($row['Friday_Co']) - strtotime($row['Friday_Ci']);
$saturday = strtotime($row['Saturday_Co']) - strtotime($row['Saturday_Ci']);
$sunday = strtotime($row['Sunday_Co']) - strtotime($row['Sunday_Ci']);

$hours = $monday + $tuesday + $wednesday + $thursday + $friday + $saturday + $sunday;

echo "<br><br>Total hours for this week: " . $hours;
    }
}
else{
    echo "0 results";
}
?>

<br>
<a href="reg.php" class="btn btn-success">Go to Register Page</a><br><br>
<a href="liscreen.php" class="btn btn-success">Go to Log-In Page</a><br><br>
<a href="clockpage.php" class="btn btn-success">Go to Clock-In Page</a><br><br>


</body>
</html>
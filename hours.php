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
    while($row = $result->fetch_assoc()){
        echo "<center><br><br><b>Monday:</b><br>" . $row['Monday_Ci'] . "-in<br>" . $row['Monday_Co'] . "-out<br><br><b>Tuesday:</b><br>" . $row['Tuesday_Ci'] . "-in<br>" . $row['Tuesday_Co'] . "-out<br><br><b>Wednesday:</b><br>" . $row['Wednesday_Ci'] . "-in<br>" . $row['Wednesday_Co'] . "-out<br><br><b>Thursday:</b><br>" . $row['Thursday_Ci'] . "-in<br>" . $row['Thursday_Co'] . "-out<br><br><b>Friday:</b>:<br>" . $row['Friday_Ci'] . "-in<br>" . $row['Friday_Co'] . "-out<br><br><b>Saturday:</b><br>" . $row['Saturday_Ci'] . "-in<br>" . $row['Saturday_Co'] . "-out<br><br><b>Sunday:</b><br>" . $row['Sunday_Ci'] . "-in<br>" . $row['Sunday_Co'] . "-out<br><br></center>";
$monday = strtotime($row['Monday_Co']) - strtotime($row['Monday_Ci']);
$tuesday = strtotime($row['Tuesday_Co']) - strtotime($row['Tuesday_Ci']);
$wednesday = strtotime($row['Wednesday_Co']) - strtotime($row['Wednesday_Ci']);
$thursday = strtotime($row['Thursday_Co']) - strtotime($row['Thursday_Ci']);
$friday = strtotime($row['Friday_Co']) - strtotime($row['Friday_Ci']);
$saturday = strtotime($row['Saturday_Co']) - strtotime($row['Saturday_Ci']);
$sunday = strtotime($row['Sunday_Co']) - strtotime($row['Sunday_Ci']);
$seconds = $monday + $tuesday + $wednesday + $thursday + $friday + $saturday + $sunday;
$hours = (float)($seconds / 3600);
$hoursremainder = ($hours - (floor($hours)));
$hours = floor($hours);
$minutes = $hoursremainder * 60;
$minutesremainder = ($minutes - (floor($minutes)));
$minutes = floor($minutes);
$seconds = $minutesremainder * 60;
echo "<center><br><br><b>Total hours:" . $hours . " Hours: " . $minutes . " Minutes: " . $seconds . " Seconds<b><br><br><center>";
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
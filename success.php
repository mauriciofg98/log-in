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
$result = $db->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<h3>" . $row["ID"]. "</h3><br>";
    }
}
else{
    echo "0 results";
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
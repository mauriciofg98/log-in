<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost:3307', 'gfonsec2', 'LuckyFonsec1;', 'clock');

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
  // echo "succesfull connection";
}

// REGISTER USER
if (isset($_POST['reg_user'])){
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

if (isset($_POST['reg_employee']))
{
  $Employee_Name = mysqli_real_escape_string($db, $_REQUEST['Employee_Name']);
  $Employee_Email = mysqli_real_escape_string($db, $_REQUEST['Employee_Email']);
  $Employee_Gender = mysqli_real_escape_string($db, $_REQUEST['Employee_Gender']);  
  $Employee_Age = mysqli_real_escape_string($db, $_REQUEST['Employee_Age']);
  $Employee_DOB = mysqli_real_escape_string($db, $_REQUEST['Employee_DOB']);
  $Employee_Race = mysqli_real_escape_string($db, $_REQUEST['Employee_Race']);
  $Employee_Social = mysqli_real_escape_string($db, $_REQUEST['Employee_Social']);
  $Employee_Address = mysqli_real_escape_string($db, $_REQUEST['Employee_Address']);
  $Employee_Phone = mysqli_real_escape_string($db, $_REQUEST['Employee_Phone']);
  $Employee_Work_Description = mysqli_real_escape_string($db, $_REQUEST['Employee_Work_Description']);
  $Project_ID = mysqli_real_escape_string($db, $_REQUEST['Project_ID']);
  $User_Login = mysqli_real_escape_string($db, $_REQUEST['User_Login']);
  $Employed_Date = mysqli_real_escape_string($db, $_REQUEST['Employed_Date']);

  $sql = "INSERT INTO employee ( Employee_Name, Employee_Gender, Employee_Age, Employee_DOB, Employee_Race, Employee_Social, Employee_Address, Employee_Email, Employee_Phone, Employee_Work_Description, Project_ID, User_Login, Employed_Date) VALUES ( '$Employee_Name', '$Employee_Gender', '$Employee_Age', '$Employee_DOB', '$Employee_Race', '$Employee_Social','$Employee_Address', '$Employee_Email', '$Employee_Phone', '$Employee_Work_Description', '$Project_ID', '$User_Login', 'Employed_Date')";
  if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
}


if (isset($_POST['projectloc']))
{
   $Project_Address = mysqli_real_escape_string($db, $_REQUEST['Project_Address']);
   $Project_Location_Name = mysqli_real_escape_string($db, $_REQUEST['Project_Location_Name']);
   $Project_ZIP = mysqli_real_escape_string($db, $_REQUEST['Project_ZIP']);
   $Project_Location_City = mysqli_real_escape_string($db, $_REQUEST['Project_Location_City']);
   $Project_Location_County = mysqli_real_escape_string($db, $_REQUEST['Project_Location_County']);
   $Region_ID= mysqli_real_escape_string($db, $_REQUEST['Region_ID']);


  $sql = "INSERT INTO Project_Location ( Project_Address, Project_Location_Name, Project_ZIP, Project_Location_City, Project_Location_County, Region_ID) VALUES ( '$Project_Address', '$Project_Location_Name', '$Project_ZIP', '$Project_Location_City', '$Project_Location_County', '$Region_ID')";
  if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

}
//////////////////////////////////////////////////////////////////////////
if (isset($_POST['reg']))
{
  $Name = mysqli_real_escape_string($db, $_REQUEST['Name']);
  $Age = mysqli_real_escape_string($db, $_REQUEST['Age']);
  $sql = "INSERT INTO Employee ( Name, Age) VALUES ( '$Name', '$Age')";
  if(mysqli_query($db, $sql)){
    #echo "Records added successfully.";
  }
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
}

if (isset($_POST['weekid'])){
  $ID = mysqli_real_escape_string($db, $_REQUEST['ID']);
  $sql = "INSERT INTO Week ( ID, Monday_Ci, Monday_Co, Tuesday_Ci, Tuesday_Co, Wednesday_Ci, Wednesday_Co, Thursday_Ci, Thursday_Co, Friday_Ci, Friday_Co, Saturday_Ci, Saturday_Co, Sunday_Ci, Sunday_Co) VALUES ('$ID', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000')";
  if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
  }
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
}

// if (isset($_POST['week'])){
//   $ID = mysqli_real_escape_string($db, $_REQUEST['ID']);
//   $Monday_Ci = mysqli_real_escape_string($db, $_REQUEST['Monday_Ci']);
//   $Monday_Co = mysqli_real_escape_string($db, $_REQUEST['Monday_Co']);
//   $Tuesday_Ci = mysqli_real_escape_string($db, $_REQUEST['Tuesday_Ci']);
//   $Tuesday_Co = mysqli_real_escape_string($db, $_REQUEST['Tuesday_Co']);
//   $Wednesday_Ci = mysqli_real_escape_string($db, $_REQUEST['Wednesday_Ci']);
//   $Wednesday_Co = mysqli_real_escape_string($db, $_REQUEST['Wednesday_Co']);
//   $Thursday_Ci = mysqli_real_escape_string($db, $_REQUEST['Thursday_Ci']);
//   $Thursday_Co = mysqli_real_escape_string($db, $_REQUEST['Thursday_Co']);
//   $Friday_Ci = mysqli_real_escape_string($db, $_REQUEST['Friday_Ci']);
//   $Friday_Co = mysqli_real_escape_string($db, $_REQUEST['Friday_Co']);
//   $Saturday_Ci = mysqli_real_escape_string($db, $_REQUEST['Saturday_Ci']);
//   $Saturday_Co = mysqli_real_escape_string($db, $_REQUEST['Saturday_Co']);
//   $Sunday_Ci = mysqli_real_escape_string($db, $_REQUEST['Sunday_Ci']);
//   $Sunday_Co = mysqli_real_escape_string($db, $_REQUEST['Sunday_Co']);
//   $sql = "INSERT INTO Employee ( Name, Age) VALUES ( '$Name', '$Age')";
//   if(mysqli_query($db, $sql)){
//     #echo "Records added successfully.";
//   }
//   else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
//   }
// }

if (isset($_POST['clock'])){

  $date = date('Y-m-d H:i:s.u');
  $id = mysqli_real_escape_string($db, $_REQUEST['ID']);

  $conn = mysqli_connect('localhost:3307', 'gfonsec2', 'LuckyFonsec1;', 'clock');
//Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT ID FROM Employee WHERE ID='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    // output data of each row
    //while($row = $result->fetch_assoc()) {
      // header("Location: hours.php?flag=0";
      // header('Location:clockdatecheck.php?ID=' . $row['ID']);
    //}

$unixTimestamp = strtotime($date);
$dayOfWeek = date("l", $unixTimestamp);
echo $date; 
//echo $date . ' fell on a ' . $dayOfWeek;
$query;
$out;
if ($dayOfWeek == "Monday"){
  $query = "Monday_Ci";
  $out = "Monday_Co";
}
else if ($dayOfWeek == "Tuesday"){
  $query = "Tuesday_Ci";
  $out = "Tuesday_Co";
}
else if ($dayOfWeek == "Wednesday"){
  $query = "Wednesday_Ci";
  $out = "Wednesday_Co";
}
else if ($dayOfWeek == "Thursday"){
  $query = "Thursday_Ci";
  $out = "Thursday_Co";
}
else if ($dayOfWeek == "Friday"){
  $query = "Friday_Ci";
  $out = "Friday_Co";
}
else if ($dayOfWeek == "Saturday"){
  $query = "Saturday_Ci";
  $out = "Saturday_Co";
}
else if ($dayOfWeek == "Sunday"){
  $query = "Sunday_Ci";
  $out = "Sunday_Co";
}
else {
  echo "Error!";
}
$sql = "SELECT $query, $out FROM Week WHERE ID='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
  $row = $result->fetch_assoc();
  echo $row[$query] . " " . $row[$out];
  //When they Clock-In Correctly
  if(($row[$query] == '0000-00-00 00:00:00' && $_POST['clock'] == '0') && ($row[$out] == '0000-00-00 00:00:00.000000' && $_POST['clock'] == '0')){
    $sql = "UPDATE Week SET $query = '$date' WHERE ID = '$id'";
    echo "Successfully Clocked-In!";
  }
  //When they Clock-Out Correctly
  else if(($row[$query] != '0000-00-00 00:00:00' && $_POST['clock'] == '1') && ($row[$out] == '0000-00-00 00:00:00.000000' && $_POST['clock'] == '1')){
    $sql = "UPDATE Week SET $out = '$date' WHERE ID = '$id'";
    echo "Successfully Clocked-Out!";
  }
  //When they "double" Clock-In
  else if(($row[$query] != '0000-00-00 00:00:00' && $_POST['clock'] == '0') && ($row[$out] == '0000-00-00 00:00:00.000000' && $_POST['clock'] == '0')){
    header('Location: clockpage.php?a=c');
  }
  //When they "double" Clock_Out
  else if(($row[$query] == '0000-00-00 00:00:00' && $_POST['clock'] == '1') && ($row[$out] == '0000-00-00 00:00:00.000000' && $_POST['clock'] == '1')){
    header('Location: clockpage.php?a=b');
  }
  else{
    echo "Default Case.";
  }
}
}
else{
    echo "0 results";
}

  if(mysqli_query($db, $sql)){
    #echo "Records added successfully.";
  }
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
}
?>
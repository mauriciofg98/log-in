
<?php
 $sql= "INSERT INTO Employee ( Employee_ID, Employee_Name, Employee_Gender, Employee_Age, Employee_DOB, Employee_Race_ID, Employee_Social, Employee_Adress, Employee_HRS_W, Employee_Email, Employee_Phone, Employee_Work_Description, Project_ID, User_Login
 	 VALUES 
 	 ('$[Employee_ID]','$[Employee_Name]','$[Employee_Gender]','$[Employee_Age]','$[Employee_DOB]','$[Employee_Race_ID]','$[Employee_Social]','$[Employee_Adress]','$[Employee_HRS_W]','$[Employee_Email]','$[Employee_Phone]','$[Employee_Work_Description]'),'$[Project_ID]','$[User_Login]'";

 //	mysqli_query($con, $sql);

 if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error());
  }

echo "1 record added";
mysql_close($con)
?> 


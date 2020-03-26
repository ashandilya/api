<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once 'config.php';

    // Connecting to mysql database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('unable to connect.');
    // require "connect.php";
	
// 	$Student_Id = $_POST["Student_Id"];
	$Student_First_Name = $_POST["Student_First_Name"];
	$Student_Last_Name = $_POST["Student_LastL_Name"];
	$Student_Phone_No = $_POST["Student_Phone_No"];
	$Class = $_POST["Class"];
	$Email = $_POST["Email"];
	$Board = $_POST["Board"];
	$City = $_POST["City"];
	$School_Name = $_POST["School_Name"];
	
	//$get_Student_Phone_No = $_GET["Student_Phone_No"];
	
	$sqlPhone = "SELECT * FROM `student_registration` WHERE `Student_Phone_No` = '$Student_Phone_No'" ;
	
	$result = mysqli_query($conn, $sqlPhone);
	
	if(mysqli_num_rows($result)>0)
	{
		$status = "exist";
	}else{
// 		$sql = "insert into student_registration values('', '$Student_First_Name', '$Student_Last_Name', '$Student_Phone_No', '$Class', '$Email', '$Board', '$City', '$School_Name');";
		
		$sql = "INSERT INTO `student_registration`(`Student_First_Name`, `Student_Phone_No`, `Student_Last_Name`, `Class`, `Email`, `Board`, `City`, `School_Name`) VALUES ('$Student_First_Name','$Student_Phone_No','$Student_Last_Name','$Class','$Email','$Board','$City','$School_Name')";
		
		if(mysqli_query($conn, $sql))
		{
			$status = "ok";
		}else{
			$status = "error";
		}			
	}
	
	$results= array();
	
	while($row = mysqli_fetch_array($result))
	{
	    array_push($results, array(
	        'status' => $status,
	        'Student_First_Name' => $row['Student_First_Name'], 
	        'Student_Last_Name' => $row['Student_Last_Name'], 
	        'Student_Phone_No' => $row['Student_Phone_No'], 
	        'Class' => $row['Class'], 
	        'Email' => $row['Email'], 
	        'Board' => $row['Board'], 
	        'City' => $row['City'], 
	        'School_Name' => $row['School_Name']
	    ));
	}
	
	 echo json_encode(array("result" => $results));
	 mysqli_close($conn);
?>
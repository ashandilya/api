<?php
	
	define('DB_HOST', '127.0.0.1');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'happilearning');
	
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	if(mysqli_connect_errno()){
		die('Unable to Connect to database'.mysqli_connect_errno());
	}else
	{
		echo "Connection successful"
	}
	
	$Student_Id = $_POST["Student_Id"];
	$Student_F_Name = $_POST["Student_F_Name"];
	$Student_L_Name = $_POST["Student_L_Name"];
	$Phone = $_POST["Phone"];
	$Class = $_POST["Class"];
	$Email = $_POST["Email"];
	$Board = $_POST["Board"];
	$City = $_POST["City"];
	$School_Name = $_POST["School_Name"];
	
	$sqlCheckPhone = "select * from student_registration where Phone = '$Phone'";
	
	$result = mysql_query(mysqli_connect_errno, $sqlCheckPhone);
	
	if(mysqli_num_rows($result)>0)
	{
		$status = "exist";
	}else{
		$sql = "insert into student_registration values('$Student_Id', '$Student_F_Name', '$Student_L_Name', '$Phone', '$Class', '$Email', '$Board', '$City', '$School_Name');";
		
		if(mysql_query(mysqli_connect_errno, $sql))
		{
			$status = "ok";
		}else{
			$status = "error";
		}			
	}
	
	if($result)
	{
		while($row = mysqli_fetch_array($result))
		{
			$data[] = $row;
		}
	}
	
	//$sqlSelectClass = "select * from student_registration where Class = '$Class'";
	
	//$selectClassQuery = mysql_query(mysqli_connect_errno, $sqlSelectClass);
	
	//if(mysql_num_rows($selectClassQuery) == Class )
	//{
		
	//}
	 echo json_encode(array("response" => $status));
	 mysqli_close(mysqli_connect_errno);
?>
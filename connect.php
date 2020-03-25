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
	
	// $stmt = $conn->prepare("SELECT video_id, video_thumbnail, video_title, video_duration, video FROM math;");
	
	// $stmt->execute();
	
	// $stmt->bind_result($video_id,$video_thumbnail,$video_title,$video_duration, $video);
	
	// $videolist = array();
	
	// while($stmt->fetch()){
		
	// 	$temp = array();
	// 	$temp['video_id'] = $video_id;
	// 	$temp['video_thumbnail'] = $video_thumbnail;
	// 	$temp['video_title'] = $video_title;
	// 	$temp['video_duration'] = $video_duration;
	// 	$temp['video'] = $video;
		
	// 	array_push($videolist, $temp);
	// }
	
	// echo json_encode($videolist);
?>	
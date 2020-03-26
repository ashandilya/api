<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config.php';

// Connecting to mysql database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('unable to connect.');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dat = date('dmy');
    $time = time() . $dat;
    $desired_dir = "../blog_img";
    $blog_title = htmlspecialchars($_POST['blog_title']);
    $Subject = $_POST["Subject"];
    $DoubtText = $_POST["DoubtText"];
    

    if ($_FILES['file']['name']) {
        if (is_dir($desired_dir) == false) {
            mkdir("$desired_dir", 0700);        // Create directory if it does not exist
        }
        
     
        move_uploaded_file($_FILES['file']['tmp_name'], "../blog_img/" .$time.$_FILES['file']['name']);
        $org = 'blog_img/'.$time.$_FILES['file']['name'];
        $ce5 = mysqli_query($conn, "INSERT INTO `img_db` VALUES('','$blog_title','$org', '$Subject', '$DoubtText')");  
    
        echo json_encode(array('status' => true));
    } else {
        echo json_encode(array('status' => false));
    } 
} else {
    echo json_encode(array('status' => false));
}
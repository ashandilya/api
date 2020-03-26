<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../config.php';
    // Connecting to mysql database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('unable to connect.');
    $response = array();
    
    if(isset($_POST['phone_num'])){
        $phone = $_POST['phone_num'];
        
        $stmt =("SELECT * from `student_registration` WHERE Student_Phone_No = '$phone'");

        //$stmt->bind_param("s", $phone);

        // $stmt->execute();

        // $stmt->store_result();
        $result = mysqli_query($conn, $stmt);

        if (mysqli_num_rows($result) > 0) {
            // user existed
            // $stmt->close();
            $response = array('status' => true, 'message' => "User Exists.");
          
            /*while ($row = mysqli_fetch_assoc($stmt)){
              
               $row = $result->fetch_assoc();
            $response =   array('status' => true,'message' => "User Exists.", 'Student_First_Name' => $row['Student_First_Name'], 'Student_Last_Name'=> $row['Student_Last_Name'],
                    'Student_Phone_No' => $row['Student_Phone_No'], 'Class'=> $row['Class'], 'Email'=> $row['Email'], 'Board' => $row['Board'],
                    'City'=> $row['City'], 'School_Name' => $row['School_Name']);
            }*/
            echo json_encode($response);
        } else {
            // user not existed
            // $stmt->close();
            $response = array('status' => false, 'message' => "No user found.");
            
            echo json_encode($response);
        }


        /*$response = array();

       // $stmt = mysqli_query($this->$conn, "SELECT * FROM `student_registration` WHERE Student_Phone_No = '$phone'");

        $rowCount = mysqli_num_rows($stmt);

        if ($rowCount ==0){
            array_push($response,
            array('status' => false));
        }else{
            while ($row = mysqli_fetch_assoc($stmt)){
                array_push($response,
                array('status' => true, 'Student_First_Name' => $row['Student_First_Name'], 'Student_Last_Name'=> $row['Student_Last_Name'],
                    'Student_Phone_No' => $row['Student_Phone_No'], 'Class'=> $row['Class'], 'Email'=> $row['Email'], 'Board' => $row['Board'],
                    'City'=> $row['City'], 'School_Name' => $row['School_Name']));
            }
           echo json_encode($response);
        }
*/

    } else {
        $response = array('status' => false, 'message' => "please fill the phone number");
        echo json_encode($response);
    }
	
?>
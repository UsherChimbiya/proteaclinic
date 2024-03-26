<?php
include "conf.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['id']) && !empty($_POST['id'])){
        $id=filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    // Database connection parameters
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE `appointments` SET `status`='Approved' WHERE id='?'";
    $statement1 = $conn->prepare($sql);
    $statement1->bind_param("i", $id);
   
    if( $statement1->execute()){
        header ('location:appointments.php');  
    } else {
        echo "Failed to Update";
    }
    $statement1->close();
    $conn->close();
}
else {
        echo "id not set";
    }
}
else {
    echo "Form Not Submitted";
}
?>
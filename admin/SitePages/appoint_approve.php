<?php
include "conf.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $p_name = $_POST['p_name'];
    $p_sickness = $_POST['p_sickness'];
    $doctor_name = $_POST['doctor_name'];
    $appointed_time=$_POST['appointed_time'];
    
  

    $sql = "INSERT INTO approved_appointments(p_name, p_sickness, doctor_name, appointed_time)
    VALUES('$p_name', '$p_sickness', '$doctor_name', '$appointed_time')";

    if ($conn->query($sql) === TRUE) {
         //success message
         $_SESSION['success_message']="Spscialist added succesfully!";
         // redirect to the login page
         header("location:dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
      //success message
      $_SESSION['error_message']="Not added. Try again";
      // redirect to the login page
      header("location:specialist.php");
}
?>
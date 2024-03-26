<?php
include "conf.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $role=$_POST['role'];
    
  

    $sql = "INSERT INTO users(full_name, email, phone_number, role)
    VALUES('$name', '$email', '$phone_number', '$role')";

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
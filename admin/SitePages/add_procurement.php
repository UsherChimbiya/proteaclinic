<?php
include "conf.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $requested_by=$_POST['requested_by'];
    
  

    $sql = "INSERT INTO procurements(item_name, quantity, date, requested_by)
    VALUES('$item_name', '$quantity', '$date', '$requested_by')";

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
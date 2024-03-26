<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $problem_description = $_POST['problem_description'];

    // Database connection parameters
    $servername = "localhost"; // Change this if your database server is on a different host
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "proteaclinic";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into appointments table
    $sql = "INSERT INTO appointments (name, email, mobile, doctor, date, time, problem_description)
    VALUES ('$name', '$email', '$mobile', '$doctor', '$date', '$time', '$problem_description')";

    if ($conn->query($sql) === TRUE) {
         //success message
         $_SESSION['success_message']="Thank you for registering. Your Account has been created.";
         // redirect to the login page
         header("location:index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
      //success message
      $_SESSION['error_message']="Failed. Please Try Again";
      // redirect to the login page
      header("location:appointment.html");
}
?>

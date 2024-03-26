<?php
include "conf.php";
// Check if user is logged in
if(isset($_SESSION['submit'])) {
    $full_name = $_POST['full_name'];
    $email=$_POST['email'];

    // Retrieve user's name from the database
    $sql = "SELECT * FROM users WHERE full_name=$full_name and email=$email";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $full_name, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Display user's name
    if($full_name) {
        echo "Welcome, " . $user['full_name'] . "!";
    } else {
        echo "Error: User not found.";
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: admin/SitePages/dashboard.php");
    exit();
}

// Close connection
$conn->close();
?>
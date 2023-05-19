<?php

// Database connection details
$servername = "localhost";

// Mysql username
$username = "root";

// Mysql password
$password = "12345";

// Database name
$dbname = "myhomeworkdb"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from Form page
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];

// Validate form data
$errors = array();
if (empty($full_name)) {
    $errors[] = "Full Name is required.";
}
if (empty($email)) {
    $errors[] = "Email Address is required.";
}
if (empty($gender)) {
    $errors[] = "Gender is required.";
}

// Display errors or insert data into the database
if (empty($errors)) {
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO students (full_name, email, gender) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $full_name, $email, $gender);
    $stmt->execute();

    echo "Data inserted successfully.";

    include("list.php");

} else {
    // Display error messages
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}

// Close the database connection
$conn->close();
?>

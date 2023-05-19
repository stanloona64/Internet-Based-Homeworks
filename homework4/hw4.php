<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    echo "Thank you for submitting the form, $name! We will contact you at $email.";
}
?>
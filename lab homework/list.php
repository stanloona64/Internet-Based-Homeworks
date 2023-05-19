<?php

// Select all students records from the database

$sql = "SELECT * FROM students WHERE idstudents>0";
$result = $conn->query($sql);

// List student records in a table

if ($result->num_rows > 0) {
    echo "<h1>Registered Students</h1>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Gender</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idstudents"] . "</td>";
        echo "<td>" . $row["full_name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No student records found.";
}

?>

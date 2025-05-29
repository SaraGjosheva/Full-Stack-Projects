<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skp_landing";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// SQL to create the table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS contact_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    company TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $company = $_POST['company'];

    // SQL query to insert data into the correct table
    $sql = "INSERT INTO contact_form (name, surname, phone, email, company) VALUES ('$name', '$surname', '$phone', '$email', '$company')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Your form was successfully";
        header("Location: index.html?success=1");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

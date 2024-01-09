<?php
// Database connection details
$servername = "your_db_server";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "movie_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch movies from the database
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

$movies = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return movies as JSON
header('Content-Type: application/json');
echo json_encode($movies);
?>

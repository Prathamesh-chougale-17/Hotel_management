<?php
// Replace with your actual database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from the HTML form
$date = $_POST['Date'];
$time = $_POST['Time'];

// Prepare and execute the SQL query
$query = "SELECT SUM(number_of_people) AS total_people FROM customer WHERE date_col = '$date' AND time_col = '$time'";
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    $row = $result->fetch_assoc();
    $totalPeople = $row['total_people'];
    echo "Total number of people: " . $totalPeople;
} else {
    echo "Error executing query: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

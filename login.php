<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Database connection details
    $servername = "your_server_name";
    $dbusername = "your_db_username";
    $dbpassword = "your_db_password";
    $dbname = "website_db"; // Use your database name

    // Create a database connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query the database to check the login credentials
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login
        // You can set a session or redirect to a different page
        echo "Login successful!";
    } else {
        // Failed login
        echo "Login failed. Please check your username and password.";
    }

    // Close the database connection
    $conn->close();
}
?>

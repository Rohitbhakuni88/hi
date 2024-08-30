<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "rohit", "UserDatabase");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_username, $stored_password);
        $stmt->fetch();

        
        if (password_verify($password, $stored_password)) {
            
            $_SESSION['username'] = $stored_username;
            echo "Welcome, " . htmlspecialchars($stored_username) . "!";
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>

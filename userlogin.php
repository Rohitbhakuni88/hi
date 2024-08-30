<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] == $_COOKIE['username'] && password_verify($_POST['password'], $_COOKIE['password'])) {
        $_SESSION['username'] = $_POST['username'];
        header("Location: userdashboard.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>
<form action="" method="post">
    <label for="username">Username:</label><input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label><input type="password" id="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

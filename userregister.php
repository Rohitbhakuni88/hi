<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    setcookie('username', $username, time() + (86400 * 30), "/");
    setcookie('password', $password, time() + (86400 * 30), "/");

    echo "Registration successful! <a href='userlogin.php'>Login here</a>";
}
?>
<form action="" method="post">
    <label for="username">Username:</label><input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label><input type="password" id="password" name="password" required><br>
    <input type="submit" value="Register">
</form>

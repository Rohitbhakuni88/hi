<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: userlogin.php");
} else {
    echo "Welcome, " . $_SESSION['username'] . "! <a href='userlogout.php'>Logout</a>";
}
?>

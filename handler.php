<?php
session_start();

// hardcoded login
$originalUsername = "ueshika";
$originalPassword = "ucka123";

// receive data
$username = $_POST['username'];
$password = $_POST['password'];

// check login
if ($username == $originalUsername && $password == $originalPassword) {

    $_SESSION['user'] = $username;

    header("Location: index.php");
    exit();

} else {

    echo "❌ Login Failed";
    echo "<br><a href='index.php'>Try Again</a>";
}
?>
<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ? ");
    $query->bind_param("ss", $username, $password)
    $query-> ecexute();
    $result = $query->get_result();

    if ($result->num_rows === 1){
        $_SESSION["user"] = $username;
        $_SESSION["last_activity"] = time();
        header("Location: admin.php");
    } else {
        header("Location: error.php");
    }
    exit();
}
?>

<form method="POST">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="submit" value="Login">
</form>
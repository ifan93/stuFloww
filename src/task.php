<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$servername = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbName = "workflow";

$conn = new mysqli($servername, $serverUsername, $serverPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$f_nTaskTitle = $_POST['f-nTaskTitle'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO workflows (Wname, creator_id) VALUES ($f_nTaskTitle, $user_id)";

if ($stmnt->execute()) {
    echo "Task added"; 
    exit();
} else {
    echo "Error: " . $stmnt->error;
}

$stmnt->close();
$conn->close();
?>
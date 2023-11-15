<?php
$servername = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbName = "workflow"; // name of the MySQL database

// Create connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the login form
    $Aname = $_POST['Aname'];
    $Apassword = $_POST['Apassword'];

    // Prepare and execute the SQL query
    $sql = "SELECT adminName, passwords FROM admins WHERE adminName = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error in the SQL query: ' . $conn->error);
    }

    $stmt->bind_param("s", $Aname);
    $stmt->execute();

    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($dbaName, $dbPassword);
        $stmt->fetch();

        if (password_verify($Apassword, $dbPassword)) {
            echo "<script>alert('Welcome admin'); window.location.href='../adminPage.html';</script>";
        } else {
            echo "<script>alert('Wrong password'); window.location.href='../adminLogin.html';</script>";
        }
    } else {
        echo "<script>alert('Wrong username'); window.location.href='../adminlogin.html';</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>

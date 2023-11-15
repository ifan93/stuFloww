<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "workflow";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //get input value
    $deleteUser = $_POST['deleteUser'];
    // sql to delete a record
    $sql = "DELETE FROM users WHERE user_id='$deleteUser'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('user has been deleted succesfully');window.location.href='../delete.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    //close connection
    $conn->close();

    ?>
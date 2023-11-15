<?php
$servername="localhost";
$serverUsername="root";
$serverPassword="";
$dbName="workflow";#name of the MySQL database


#establish a connection to a MySQL database
$conn= new mysqli($servername,$serverUsername,$serverPassword,$dbName);

#check the connection to the database.if error occurred during connection then error message will be displayed
if($conn->connect_error)
{
    die("Connection failed :" .$conn->connect_error );
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    #retrieve data from sign up form and store each of the data to variables
    $username=$_POST['uname'];
    $password=$_POST['password'];

    $sql = "SELECT username, password_hash FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows == 1){
        $stmt->bind_result($dbUsername,$dbPasswordHash);
        $stmt->fetch();

        if(password_verify($password,$dbPasswordHash)){
            echo "<script>alert('Successfully signed in'); window.location.href='../task.html';</script>";

        }
        else{
            echo "<script>alert('wrong password please try again');window.location.href='../login.html';</script>";
        }

    }
    else{
        echo "<script>alert('wrong username');window.location.href='../login.html';</script>";

    }
}

#close database connection
$stmt->close();
$conn->close(); 
?>
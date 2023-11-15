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

#retrieve data from sign up form and store each of the data to variables
$uname=$_POST['uname'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=password_hash ($_POST['password'],PASSWORD_BCRYPT);

#insert data into database table user
$sql= "INSERT INTO users (username,email,password_hash,fname) VALUES (?,?,?,?)";
$stmnt=$conn->prepare($sql);
$stmnt->bind_param("ssss",$username,$email,$password,$uname);

if($stmnt->execute()){
    echo "<script>alert('Successfully added new user'); window.location.href='../add.php';</script>";

    exit();
}
else{
    echo "error:".$stmnt->error;
    
}

#close database connection
$stmnt->close();
$conn->close(); 
?> 
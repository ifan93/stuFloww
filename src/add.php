<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stuFlow-admin</title>
    <link href="https://fonts.cdnfonts.com/css/cyberpunk-is-not-dead" rel="stylesheet">

    <link href='css/login.css' rel='stylesheet'>

    <style>
        
        table {
            position: absolute;
            top: 100px;
            width: 80%;
            margin: 20px auto;
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            color: white;
        }

        th {
            background-color: #f2f2f2;
        }

        
        .x h1 {
            font-family: 'Cyberpunk Is Not Dead', sans-serif;
            margin-top: -130%;
            margin-left: 120%;
            width: 100%;
            color: white;
        }

        /* Add some styling to the form */
        .bckbtn {
            margin-top: 20px;
            text-align: center;
        }

        .bckbtn button {
            border-radius: 12px;
            padding: 10px;
            background-color: #003749;
            color: white;
            outline: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 15px;
        }

        .bckbtn button:hover {
            background-color: white;
            color: black;
        }

        .wrapper {
            width: 420px;
            background: transparent;
            border: 2px solid white;
            backdrop-filter: blur(100px);
            color: azure;
            border-radius: 20px;
            padding: 30px 30px;
            margin-top: 30%;
            margin-right: 15%;
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: white;
            padding: 20px 45px 20px 20px;

        }

        .input-box input::placeholder {
            color: white;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .wrapper .remember-forgot {

            display: flex;
            justify-content: space-between;
            font-size: 14px;
            mar
        }

        .remember-forgot label input {
            accent-color: white;
            margin-right: 3px;


        }

        .remember-forgot a {
            color: white;
            text-decoration: none;

        }

        .remember-forgot a:hover {
            text-decoration: underline;

        }

        .wrapper .btn {
            width: 100%;
            height: 45px;
            background: white;
            border-radius: 40px;
            border: none;
            outline: none;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            font-size: 16px;
            font-weight: 600;
            color: #333;

        }

        .wrapper .sign-in {
            font-size: 14px;
            text-align: center;
            margin: 20px 0 15px;
        }

        .sign-in p a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .sign-in p a:hover {

            text-decoration: underline;
        }
    </style>

</head>

<body>
    

    <?php
    $servername = "localhost";
    $serverUsername = "root";
    $serverPassword = "";
    $dbName = "workflow"; // name of the MySQL database
    // Create connection
    $conn = new mysqli($servername, $serverUsername, $serverPassword, $dbName);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
        echo '<tr>
                <td align="center"><b>No</b></td>
                <td align="center"><b>USER ID</b></td>
                <td align="center"><b>USERNAME</b></td>
                <td align="center"><b>NAME</b></td>
                <td align="center"><b>EMAIL</b></td>
              ';
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td align="center">' . $i . '</td>';
            echo '<td align="center">' . $row["user_id"] . '</td>';
            echo '<td align="center">' . $row["username"] . '</td>';
            echo '<td align="center">' . $row["fname"] . '</td>';
            echo '<td align="center">' . $row["email"] . '</td>';
            echo '</tr>';
            $i++;
        }
        echo '</table>';
    } else {
        echo "<script>alert('No user record in the database')</script>";
    }

    // Close connection
    $conn->close();
    ?>

    <!-- Back button -->
    

    <!-- Signup form -->
    <div class="wrapper">
        <form action="php/addDB.php" method="post">
            <h1>user info</h1>
            <?php

            ?>
            <div class="input-box">
                <input type="text" name="uname" placeholder=" full Name" required>
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="input-box">
                <input type="text" name="username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="email" required>
                <i class='bx bx-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bx-lock-alt'></i>
            </div>


            <button class="btn" type="submit">add new user</button>

        </form>
        <div class="bckbtn">
        <a href="adminPage.html"><button>Main Menu</button></a>
    </div>
    </div>

</html>
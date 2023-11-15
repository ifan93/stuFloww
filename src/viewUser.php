<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stuFlow-admin</title>
    <link href="https://fonts.cdnfonts.com/css/cyberpunk-is-not-dead" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <style>
        table {
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
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
            color: black;
        }

        .x h1 {
            font-family: 'Cyberpunk Is Not Dead', sans-serif;
        }

        /* Add some styling to the form */
        form {
            margin-top: 20px;
            text-align: center;
        }


        form input[type="submit"] {
            padding: 10px;
            border-radius: 0px 10px 10px 0px;
            width: 10%;
            background-color: grey;

        }

        form input[type="submit"]:hover {
            cursor: pointer;
            background-color: #003749;
            color: white;

        }

        .bckbtn button {
            border-radius: 12px;
            width: 100%;
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
    </style>

</head>

<body>
    <div class="x">
        <h1>User record</h1>
    </div>

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

    <!-- Delete user form -->
    <div class="bckbtn">
        <a href="adminPage.html"><button>Main Menu</button></a>
    </div>

</body>

</html>

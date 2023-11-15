<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stuFlow-login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'
     rel='stylesheet'>
     <link href='css/login.css'
     rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="php/signUpDB.php" method="post">
            <h1>Sign up</h1>
            <?php
            if (isset($_GET['success'])) {
                $success = $_GET['success'];
                echo '<p>' . $success . '</p>';
            }
            ?>
            <div class="input-box">
                <input type="text" name="uname" placeholder="Name" required>
                <i class='bx bx-user-circle'></i>
            </div>  
            <div class="input-box">
                <input type="text" name="username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>  
            <div class="input-box">
                <input type="email" name="email" placeholder="email" required>
                <i class='bx bx-envelope' ></i>
            </div>  
            
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bx-lock-alt' ></i>
            </div>  

            <div class="remember-forgot">
                <label> <input type="checkbox">Remember me</label>
              
            </div>
            <button class="btn" type="submit">Sign up</button>
            
        </form>
    </div>
    
</body>
</html>
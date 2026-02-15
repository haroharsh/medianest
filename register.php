<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<?php
include("includes/config.php");

if(isset($_POST['register'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $check = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0) {
        $message = "Email already exists!";

    } else {
        $query = "INSERT INTO users (username, email, password)
                  VALUES ('$username', '$email', '$password')";

        if(mysqli_query($conn, $query)) {
            header("Location: index.php");
            exit();

        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediaNest</title>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url("https://res.cloudinary.com/dqbbuncyr/image/upload/v1771136046/Knight_Image_uq8uie.png");
            background-size: cover;
            background-position: center;
            
        }

        .container {
            height: 100%;       
            display: flex;
            justify-content:flex-end;
            align-items: center;
                padding-right: 50px;
            
            
        }
        
        .logincard {
            width: 350px;
            background-color: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 50px;
            text-align: center;
        }

        .logincard h1 {
            margin-bottom: 10px;
          
        }

        .logincard p {
            margin-bottom: 25px;
            color: #555;
        }
        .logincard input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        .logincard button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 6px;
            background-color:#3a56d4;
            color: #f2db2d;
            font-size: 16px;
            cursor: pointer;
        }

        .logincard .signup {
            margin-top: 15px;
            font-size: 14px;
            text-decoration: dotted;
            
        }

        .logincard .signup a {
            color: #f2db2d;
        }
        body::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
}
.container {
    position: relative;
}
    .logincard {
    transition: 0.3s ease;
}

.logincard:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
}

.message {
    color: #f2db2d;
    font-weight: bold;
    margin-bottom: 10px;
}

.logincard button:hover {
    background: #f2db2d;
    color: black;
}
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateX(40px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.logincard {
    animation: fadeIn 0.8s ease forwards;
}
    </style>
</head>
<body>

    <div class="container">
        <div class="logincard">
            <h1>MediaNest</h1>
            <p>Register your account</p>
            <?php if(!empty($message)) { ?>
        <p style="color: yellow; font-weight: bold;">
            <?php echo $message; ?>
        </p>
    <?php } ?>
            <form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="register">Sign Up</button>
</form>
        </div>
        <a href="./pages/dashboard.php">Hello</a>
    </div>

</body>
</html>


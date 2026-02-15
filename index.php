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
        .logincard button {
            background-color:black;
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
    </style>
</head>
<body>

    <div class="container">
        <div class="logincard">
            <h1>MediaNest</h1>
            <p>Login to your account</p>
            <form>
                <input type="Enter Username" placeholder="Enter Username" required>
                <input type="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>

            <div class="signup">
                Don’t have an account? <a href="#">Sign up</a>
            </div>
        </div>
        <a href="./pages/dashboard.php">Hello</a>
    </div>

</body>
</html>

<?php include 'server.php'?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <style>
        html,
        body {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            /* background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
        }
        
        .form-title {
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group input,
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        .form-group input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .login-btn {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Sign up form -->
        <section class="signup">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <!-- Register form -->
                    <form method="POST" class="register-form" id="register-form" action="register.php">
                        <?php include 'errors.php';?>
                        <!-- Firstname field -->
                        <div class="form-group">
                            <input type="text" name="first_name" id="first_name" required="_required" placeholder="First Name" />
                        </div>
                        <!-- Lastname field -->
                        <div class="form-group">
                            <input type="text" name="last_name" id="last_name" required="_required" placeholder="Last Name" />
                        </div>
                        <!-- Username field -->
                        <div class="form-group">
                            <input type="text" name="username" id="username" required="_required" placeholder="username" />
                        </div>
                        <!-- Email field -->
                        <div class="form-group">
                            <input type="email" name="email" id="email" required="_required" placeholder="Your Email" />
                        </div>
                        <!-- Number field -->
                        <div class="form-group">
                            <input type="mobile" name="mobile" id="mobile" required="_required" placeholder="Your Mobile Number" />
                        </div>
                        <!-- Password field -->
                        <div class="form-group">
                            <input type="password" name="password_1" id="password_1" required="_required" placeholder="Password" />
                        </div>
                        <!-- Confirm password field -->
                        <div class="form-group">
                            <input type="password" name="password_2" id="password_2" required="_required" placeholder="Repeat your password" />
                        </div>
                        <!-- Submit password field -->
                        <div class="form-group">
                            <input type="submit" name="reg_user" id="reg_user" class="form-submit" value="Register" />
                        </div>
                    </form>
                    <div class="login-btn">
                        <a href="login.php">Already have an account</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

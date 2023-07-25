<!-- PHP script 1 -->
<?php include('server.php')
?>
<!-- HTML 1 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        max-width: 400px;
        margin: 0 auto;
    }
    
    .form-title {
        text-align: center;
        margin-top: 0;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    
    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 91%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    
    .form-group input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
    }
    
    .form-group input[type="submit"]:hover {
        background-color: #45a049;
    }

    #submit {
            background-color: #FE347E;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            /* Match the button width to the box width */
            width: 100% !important;
            width: -moz-fit-content;
            width: -webkit-fit-content;
            width: -o-fit-content;
        }

        #submit:hover {
            background-color: #83EEFF;
        }

        #password, #username{
            width: 90%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: inset 5px 4px 9px 2px rgba(0, 0, 0, 0.1);
        }

        #passoword, #username:focus {
        outline: none;
        }
    
    @media only screen and (max-width: 600px) {
        .container {
            max-width: 100%;
            padding: 10px;
        }
    }
    .register-btn {
            text-align: center !important;
            
    }
</style>
</head>
<body>
 <!-- Login -->
 <section>
        <div class="container">
            <div class="signin-form">
                <h2 class="form-title">LOGIN</h2>
                <!-- Login Form -->
                <form method="POST" class="register-form" action="login.php">
                    <!-- Name field -->
                    <div class="form-group">
                        <label for="username">Name:</label>
                        <input type="text" name="username" id="username" required placeholder="Enter your name">
                    </div>
                    <!-- Password field -->
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" value="Log in">
                        <div class="register-btn">
                            <a href="register.php">Don't have an account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
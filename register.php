<?php include 'server.php'?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>

<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <!-- Register form -->
                        <form method="POST" class="register-form" id="register-form" action="register.php">
                            <?php include 'errors.php';?>
                            <!-- Firstname field -->
                            <input type="text" name="first_name" id="first_name" required="_required" placeholder="First Name" />
                            <!-- Lastname field -->
                            <input type="text" name="last_name" id="last_name" required="_required" placeholder="Last Name" />
                            <!-- Username field -->
                            <input type="text" name="username" id="username" required="_required" placeholder="username" />
                            <!-- Email field -->
                            <input type="email" name="email" id="email" required="_required" placeholder="Your Email" />
                            <!-- Number field -->
                            <input type="mobile" name="mobile" id="mobile" required="_required" placeholder="Your Mobile Number" />
                            <!-- Password field -->
                            <input type="password" name="password_1" id="password_1" required="_required" placeholder="Password" />
                            <!-- Confrim password field -->
                            <input type="password" name="password_2" id="password_2" required="_required" placeholder="Repeat your password" />
                            <!-- Submit password field -->
                            <input type="submit" name="reg_user" id="reg_user" class="form-submit" value="Register" />
                        </form>
                    </div class="login-btn">
                        <a href="login.php">Already have an account</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
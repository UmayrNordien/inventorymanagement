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
                        <label for="your_name"></label>
                        <input type="text" name="username" id="username" required="_required" placeholder="name">
                        <!-- Password field -->
                        <label for="your_password"></label>
                        <input type="password" name="password" id="password" required="_required" placeholder="password">

                        <input type="submit" name="submit" id="submit" value="Log in"/>
                    </form>
                </div>
        </div>
    </section>

</body>
</html>

<!-- PHP script 1 -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    header("location: table.php");
}
?>

<!-- HTML 1 -->
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="content">
    <!-- Notification message-->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <!-- Logged in as user information -->
</div>
</body>
</html>

<!-- ///////////////////////////////// -->

<!-- HTML 2 -->
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fff;
    }

    .page-container {
        display: flex;
        min-height: 100vh;
    }

    .sidebar-menu {
        width: 250px;
        background-color: #333;
        color: #fff;
        padding: 20px;
        box-sizing: border-box;
    }

    .sidebar-menu .logo {
        margin-bottom: 20px;
        text-align: center;
    }

    .sidebar-menu .logo img {
        max-width: 100%;
        height: auto;
    }

    .menu-inner nav ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .menu-inner nav ul li {
        margin-bottom: 10px;
    }

    .menu-inner nav ul li a {
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .menu-inner nav ul li a i {
        margin-right: 10px;
    }

    .main-content {
        flex: 1;
        padding: 20px;
        background:
        radial-gradient(35.36% 35.36% at 100% 25%,#0000 66%,#f8f8f8 68% 70%,#0000 72%) 55px 55px/calc(2*55px) calc(2*55px),
        radial-gradient(35.36% 35.36% at 0    75%,#0000 66%,#f8f8f8 68% 70%,#0000 72%) 55px 55px/calc(2*55px) calc(2*55px),
        radial-gradient(35.36% 35.36% at 100% 25%,#0000 66%,#f8f8f8 68% 70%,#0000 72%) 0 0/calc(2*55px) calc(2*55px),
        radial-gradient(35.36% 35.36% at 0    75%,#0000 66%,#f8f8f8 68% 70%,#0000 72%) 0 0/calc(2*55px) calc(2*55px),
        repeating-conic-gradient(#ffffff 0 25%,#0000 0 50%) 0 0/calc(2*55px) calc(2*55px),
        radial-gradient(#0000 66%,#f8f8f8 68% 70%,#0000 72%) 0 calc(55px/2)/55px 55px
        #ffffff;

    }

    .logout-btn {
        margin-top: 20px;
        text-align: center;
    }

    .logout-btn a {
        padding: 10px 15px;
        background-color: #f44336;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .logout-btn a:hover {
        background-color: #d32f2f;
    }

    .welcome-message {
        text-align: center;
        margin-bottom: 20px;
    }

    .welcome-message h2 {
        margin: 0;
    }

    @media (max-width: 767px) {
        /* .page-container {
            flex-direction: column;
        } */

        .sidebar-menu {
            width: 40%;
            margin-bottom: 20px; /* Add margin to separate from the main content */
        }

        .main-content {
            width: 100%;
        }
    }
</style>

</head>

<body>
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="logo">
                <a href="index.php"><img src="https://i.postimg.cc/2S73XHGw/SiteLogo.png" alt="site logo"></a>
            </div>
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li class="active">
                            <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i><span>Inventory</span></a>
                        </li>
                        <li>
                            <a href="./calendar-workspace/calendar.php" aria-expanded="true"><i class="fa fa-table"></i><span>My Calendar</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="main-content">
            <?php if (isset($_SESSION['first_name'])): ?>
                <div class="welcome-message">
                    <h2>Welcome, <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></h2>
                </div>
            <?php endif ?>
            <div class="logout-btn">
                <a href="index.php?logout='1'">Log out</a>
            </div>
        </div>
    </div>
</body>

</html>

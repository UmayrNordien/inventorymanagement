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
    <link rel="stylesheet" href="Inventmng/srtdash/assets/bootstrap.min.css">
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
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>srtdash - ICO Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="page-container">

        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="" alt="site logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>
                            <li>
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Item Records</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div>
                <div class="row align-items-center">
                    <div>
                        <div>
                            <!-- Search -->
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <br>
                    <a class="dropdown-item" href="index.php?logout='1'"><button>Log out</button></a>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!-- PHP Script 2 -->
<?php if (isset($_SESSION['first_name'])): ?>
    <h2 style="text-align:center"> Welcome <strong><?php echo $_SESSION['first_name']; echo " "; echo $_SESSION['last_name']; ?></strong></h2>
<?php endif ?>

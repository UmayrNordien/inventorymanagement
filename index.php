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

if (isset($_SESSION['recent_links'])) {
    // Store the current page URL in the recent links array
    $_SESSION['recent_links'][] = $_SERVER['REQUEST_URI'];
    // Keep only the top 3 recent links
    $_SESSION['recent_links'] = array_slice($_SESSION['recent_links'], 0, 3);
} else {
    // If the recent links array doesn't exist, create it and store the current page URL
    $_SESSION['recent_links'] = [$_SERVER['REQUEST_URI']];
}
// Styles
function rixcy_scripts() {
    wp_enqueue_style( 'index', get_template_directory_uri() . '/css/index.css' );
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
    <?php endif?>
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
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Dashboard</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
    body {
        font-family: "Poppins", sans-serif;        
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
        background-color: #353535;
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

    .main-item{
        box-shadow: 5px 4px 9px 2px #151515;
        border-radius: 5px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .item{
        box-shadow: 5px 4px 9px 2px #151515;
        border-radius: 5px;
        padding-top: 5px;
        padding-bottom: 5px;
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
        background-color: #FE347E;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .logout-btn a:hover {
        background-color: #83EEFF !important;
    }

    .dashboard-btn a {
        padding: 10px 15px;
        background-color: #83EEFF;
        color: #FE347E !important;
        font-weight: 500;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .dashboard-btn a:hover {
        background-color: #FE347E;
        color: #fff !important;    
    }

    .mytools-btn a {
        padding: 10px 15px;
        background-color: #83EEFF;
        color: #FE347E !important;
        font-weight: 500;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .mytools-btn a:hover {
        background-color: #FE347E;
        color: #fff !important;
    }

    .welcome-message {
        text-align: center;
        margin-bottom: 20px;
    }

    .welcome-message h2 {
        margin: 0;
    }

    .card-container{
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }

    .card{
        width: 325px;
        height: 200px;
        border: none;
        border-radius: 5px;
        box-shadow: inset 5px 4px 9px 2px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .card .card-title{
        margin-top: 1rem;
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

    /* Loader styles */
    .loader {
        border: 5px solid #FE347E;
        border-top: 5px dotted #83EEFF;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1.5s linear infinite;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        display: none; /* Hide the loader by default */
    }

    /* Loader animation */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

</head>

<body>
    <!-- Loader -->
    <div class="loader" id="loader"></div>

    <div class="page-container">
        <div class="sidebar-menu">
            <div class="logo">
                <a href="index.php"><img src="https://i.postimg.cc/2S73XHGw/SiteLogo.png" alt="site logo"></a>
            </div>
            <div class="menu-inner">
            <nav>
    <ul class="metismenu" id="menu">
        <li class="active">
            <div class="dashboard-btn">
            <a href="index.php" aria-expanded="true" onclick="myDashboardmessage()"><i class="ti-dashboard"></i><span>Dashboard</span></a>
            </div>
        </li>
        <li>
            <a href="table.php" aria-expanded="true" class="main-item"><i class="fa fa-table"></i><span><i class='bx bx-box'></i> My Inventory</span></a>
        </li>
        <li>
            <a href="./calendar-workspace/calendar.php" aria-expanded="true" class="main-item"><i class="fa fa-table"></i><span><i class='bx bx-calendar'></i> My Calendar</span></a>
        </li>
        <li class="mytools-btn">
            <a aria-expanded="true" onclick="myToolsmessage()"><i class="fa fa-table"></i><span>My Tools <i class='bx bx-down-arrow'></i></span></a>
        </li>

        <!-- <li>
            <a aria-expanded="true" class="main-item"><i class="fa fa-table"></i><span>Number Generators</span></a>
        </li> -->
        <li>
            <a href="./my-tools/randomnumgen1.php" aria-expanded="true" class="item"><i class="fa fa-table"></i><span class="nav-icon"></span><i class='bx bx-dice-1'></i> Generate 1-10</span></a>
        </li>
        <li>
            <a href="./my-tools/randomnumgen2.php" aria-expanded="true" class="item"><i class="fa fa-table"></i><span><i class='bx bx-dice-3'></i> Generate 100-1000</span></a>
        </li>
        <li>
            <a href="./my-tools/binaryconvert.php" aria-expanded="true" class="item"><i class="fa fa-table"></i><span><i class='bx bx-loader'></i> Convert to Binary</span></a>
        </li>
        <li>
            <a href="./my-tools/editor.php" aria-expanded="true" class="item"><i class="fa fa-table item"></i><span><i class='bx bx-edit-alt nav-icon'></i>Code Editor</span></a>
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
            <?php endif?>
            <div class="logout-btn">
                <a href="index.php?logout='1'" onclick="myLogoutmessage()">Log out</a>
            </div>
            <!-- Recent Links -->
            <div class="card-container row">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <span class="card-title">Recent <i class='bx bx-time-five bx-tada bx-flip-vertical'></i></span>
                        <div class="card-body">
                            <ul style="text-align: left; list-style-type: circle;">
                                <?php
                                if (isset($_SESSION['recent_links'])) {
                                    foreach ($_SESSION['recent_links'] as $link) {
                                        echo '<li><a href="' . $link . '">' . $link . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Alerts -->
                <div class="col-md-4">
                    <div class="card mb-3">
                        <span class="card-title">Alerts <i class='bx bx-bell bx-tada' ></i></span>
                        <div class="card-body">
                            <p style="text-align: left; font-size: small">
                            Network Latency Alert
                            Severity: Warning
                            Description: Notifies when network latency exceeds 500ms for a specific endpoint.
                            Conditions: IF latency > 500ms AND endpoint = "specific_endpoint"
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Settings -->
                <div class="col-md-4">
                    <div class="card mb-3">
                        <span class="card-title">Settings <i class='bx bx-cog bx-tada' ></i></span>
                        <div class="card-body">
                            <ul style="text-align: left; list-style-type: circle;">
                                <li>Profile</li>
                                <li>Password Reset</li>
                                <li>Register another account</li>
                                <li>Background</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Notes -->
                <div class="col-md-4">
                    <div class="card mb-3">
                        <span class="card-title">Notes <i class='bx bx-notepad bx-tada' ></i></span>
                        <div class="card-body">
                            <ul style="text-align: left; list-style-type: circle;">
                                <li>Style borders with softer radius</li>
                                <li>Develop a Code editor</li>
                                <li>Font/Typography</li>
                                <li>Style Buttons with Button: Active</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Lorem -->
                <div class="col-md-4">
                    <div class="card mb-3"><span class="card-title">Lorem <i class='bx bx-meh-blank bx-tada' ></i></span></div>
                </div>
                <!-- Lorem -->
                <div class="col-md-4">
                    <div class="card mb-3"><span class="card-title">Lorem <i class='bx bx-meh-blank bx-tada' ></i></span></div>
                </div>
            </div>
        </div>
    </div>
    <script>
    // Loader
    document.addEventListener("DOMContentLoaded", function () {
    // Get the loader element
    const loader = document.getElementById("loader");

    // Show the loader when the page starts loading
    loader.style.display = "block";

    // Hide the loader after the page has fully loaded
    window.addEventListener("load", function () {
        loader.style.display = "none";
    });
    });

    // Alerts
    function myDashboardmessage() {
    alert("Welcome to the Dashboard");
    }
    function myToolsmessage() {
    alert("select from the tools below");
    }
    function myLogoutmessage(){
    alert("Successfully Logged Out")
    }
    </script>
</body>
<!-- Bootstrap -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
</html>

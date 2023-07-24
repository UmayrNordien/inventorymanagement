<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            background:
            conic-gradient(from -60deg at 50% calc(100%/3),#ffffff 0 120deg,#0000 0),
            conic-gradient(from 120deg at 50% calc(200%/3),#ffffff 0 120deg,#0000 0),
            conic-gradient(from  60deg at calc(200%/3),#ffffff 60deg,#f6f6f6 0 120deg,#0000 0),
            conic-gradient(from 180deg at calc(100%/3),#ededed 60deg,#ffffff 0 120deg,#0000 0),
            linear-gradient(90deg,#ededed calc(100%/6),#f6f6f6 0 50%,
            #ededed 0 calc(500%/6), #f6f6f6 0);
            background-size: 139px 80px;

            overflow-x: hidden !important;

        }

        .navbar {
            width: 100%;
            top: 0;
            background-color: #353535;
            padding: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            margin-left: 20px;
            margin-right: 20px;
        }

        .navbar i {
            font-text-decoration: none;
            color: #FE347E;
        }
        .navbar i:hover {
            font-text-decoration: none;
            color: #83EEFF;
        }

        h1 {
            text-align: center;
        }
        h4{
            margin-left: 10px;
        }

        .box {
            background-color: #fff;
            font-size: 32px;
            margin-top: 18vh;
            width: fit-content;
            padding: 100px;
            text-align: center;
            justify-content: center;
            align-items: center;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2); 
            border-radius: 5px;
        }

        .changenum-btn {
            margin-top: 10vh;
            background-color: #FE347E;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            /* Match the button width to the box width */
            width: fit-content !important;
            width: -moz-fit-content;
            width: -webkit-fit-content;
            width: -o-fit-content;
        }

        .changenum-btn:hover {
            background-color: #83EEFF;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="navbar">
        <a href="../index.php"><i class='bx bx-left-arrow bx-fade-down' ></i> Dashboard</a>
    </div>

    <!-- Number Box -->
    <div class="box" id="numberBox">
        <?php
            echo rand(100, 1000);
        ?>
    </div>

    <!-- Button to change the number -->
    <button class="changenum-btn" onclick="changeNumber()">Generate</button>

    <script>
        function changeNumber() {
            var randomNumber = Math.floor(Math.random() * 1000) + 1;
            document.getElementById("numberBox").innerText = randomNumber;
        }
    </script>
</body>
</html>
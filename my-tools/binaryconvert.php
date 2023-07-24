<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String and Binary Converter</title>
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
    </style>
</head>
<body>
       <!-- Navigation -->
       <div class="navbar">
        <a href="../index.php"><i class='bx bx-left-arrow bx-fade-down' ></i> Dashboard</a>
        <ul class="metismenu" id="menu">
    </ul>
    </div>
    <h1>String and Binary Converter</h1>
    <form method="post" action="">
        <label for="input">Enter a String or Binary:</label>
        <input type="text" name="input" id="input" required>
        <button type="submit">Convert</button>
    </form>
    <br>

    <?php
    function stringToBinary($string) {
        $binary = '';
        $length = strlen($string);
        for ($i = 0; $i < $length; $i++) {
            $binary .= str_pad(decbin(ord($string[$i])), 8, '0', STR_PAD_LEFT);
        }
        return $binary;
    }

    function binaryToString($binary) {
        $string = '';
        $length = strlen($binary);
        for ($i = 0; $i < $length; $i += 8) {
            $byte = substr($binary, $i, 8);
            $string .= chr(bindec($byte));
        }
        return $string;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = $_POST['input'];
        $output = '';
        if (preg_match('/^[01]+$/', $input)) {
            // Input is binary, convert to string
            $output = binaryToString($input);
        } else {
            // Input is a string, convert to binary
            $output = stringToBinary($input);
        }
        echo '<p><strong>Output:</strong> ' . $output . '</p>';
    }
    ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Editor</title>
    <style>
        body{
            background:
        radial-gradient(35.36% 35.36% at 100% 25%,#0000 66%,#f8f8f8 68% 70%,#0000 72%) 55px 55px/calc(2*55px) calc(2*55px),
        radial-gradient(35.36% 35.36% at 0    75%,#0000 66%,#f8f8f8 68% 70%,#0000 72%) 55px 55px/calc(2*55px) calc(2*55px),
        radial-gradient(35.36% 35.36% at 100% 25%,#0000 66%,#f8f8f8 68% 70%,#0000 72%) 0 0/calc(2*55px) calc(2*55px),
        radial-gradient(35.36% 35.36% at 0    75%,#0000 66%,#f8f8f8 68% 70%,#0000 72%) 0 0/calc(2*55px) calc(2*55px),
        repeating-conic-gradient(#ffffff 0 25%,#0000 0 50%) 0 0/calc(2*55px) calc(2*55px),
        radial-gradient(#0000 66%,#f8f8f8 68% 70%,#0000 72%) 0 calc(55px/2)/55px 55px
        #ffffff;
        }
        .editor-title{
            text-align: center;
            margin: 10px;
        }
        .container {
            margin-top: 10vh;
        }

        .column {
            background: #fff;
            display: inline-block;
            vertical-align: top;
            width: 48%;

            padding: 20px;
            border: none;
            margin: 5px;

            border-radius: 5px;
            box-shadow: inset 5px 4px 9px 2px rgba(0, 0, 0, 0.1);
        }

        textarea{
            border: none;
            resize: none;
            width: 100%;
            padding: 20px;
            border-radius: 5px;
            box-shadow: inset 5px 4px 9px 2px rgba(0, 0, 0, 0.1);
        }
        span{
            top:0;
            left:0;
            position: absolute;
            margin: 10px 20px 20px 20px;
            font-size: 32px;
        }
        i {
            font-text-decoration: none;
            color: #FE347E;
        }
        i:hover {
            font-text-decoration: none;
            color: #83EEFF;
        }
        
    </style>
</head>
<body>
    <div class="editor-title">
        <h1>Editor</h1>
    </div>

    <div>
        <a href="../index.php"><span><i class='bx bx-left-arrow bx-fade-left' ></i></span></a>
    </div>

    <div class="container">
        <div class="column">
            <h2>Input :</h2>
            <textarea id="input" rows="10" cols="40"></textarea>
        </div>
        <div class="column">
            <h2>Output :</h2>
            <div id="output"></div>
        </div>
    </div>

    <script>
    </script>
</body>
</html>

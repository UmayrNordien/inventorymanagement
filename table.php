<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #353535;
            padding: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            margin-right: 20px;
        }

        h1 {
            text-align: center;
        }
        h4{
            margin-left: 10px;
        }
        /* Form */
        form {
            margin-bottom: 20px;
            text-align: center;
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
        .form-group input[type="number"] {
            width: 25%;
            padding: 10px;
            border: none;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
            box-shadow: inset 5px 4px 9px 2px rgba(0, 0, 0, 0.1);
        }

        .btn-default{
            border: none;
            border-radius: 5px;
            background-color: #e4e4e4;
            padding: 10px;
            box-shadow: 5px 4px 9px 2px rgba(0, 0, 0, 0.1);

        }
        .btn-default:hover{
            opacity: 80%;
        }
        .btn-default:active{
            box-shadow: inset 5px 4px 9px 2px rgba(0, 0, 0, 0.1);
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #353535;
            color: #fff;
            text-align: left; /* align with item text */
        }

        .card {
            margin-bottom: 20px;
        }

        .header-title {
            margin-bottom: 10px;
        }

        .single-table {
            overflow-x: auto;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                padding: 10px;
            }

            .navbar a {
                margin-right: 10px;
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 24px;
            }

            form {
                margin-bottom: 10px;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <div class="navbar">
        <a href="index.php">Dashboard</a>
        <a href="table.php">Inventory</a>
    </div>

    <h1>Add Item Here</h1>

    <form method="POST" action="additem.php">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="product_name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control" name="price" min="1" max="999.99" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="name">Quantity</label>
            <input type="number" class="form-control" name="quant" id="quant" min="1" max="999.99" placeholder="Enter Quantity">
        </div>
        <button type="submit" class="btn btn-default" name="add">Add item +</button>
    </form>

    <div class="main-content-inner">
        <div class="row">
            <!-- Contextual Classes start -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Inventory</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <!-- Table -->
                                <table class="table text-dark text-center">
                                    <thead class="text-uppercase">
                                        <tr class="table-active">
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = new mysqli("localhost", "root", "", "inventorymanagement");
                                        $sql = "SELECT * FROM product";
                                        $result = $conn->query($sql);
                                        $count = 0;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $count++;
                                        ?>
                                                <tr>
                                                    <td><?php echo $count ?></td>
                                                    <td><?php echo $row["product_name"] ?></td>
                                                    <td><?php echo $row["price"] ?></td>
                                                    <td><?php echo $row["quantity"] ?></td>
                                                    <td>
                                                        <a href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a>
                                                        <a href="deleteitem.php?id=<?php echo $row["product_id"] ?>">Delete</a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

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
            background-color: #f5f5f5;
            padding: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: #333;
            margin-right: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
            text-align: left;
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
        <a href="table.php">Item Records</a>
    </div>

    <h1>Add Item Here</h1>

    <form method="POST" action="additem.php">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="product_name">
        </div>
        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="form-group">
            <label for="name">Quantity</label>
            <input type="number" name="quant" id="quant" min="1" max="">
        </div>
        <button type="submit" class="btn btn-default" name="add">Add item</button>
    </form>

    <div class="main-content-inner">
        <div class="row">
            <!-- Contextual Classes start -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Products</h4>
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

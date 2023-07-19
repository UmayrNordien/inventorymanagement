<?php
include('config.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($db, $_POST['product_name']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $quant = mysqli_real_escape_string($db, $_POST['quantity']);

    mysqli_query($db, "UPDATE product SET product_name='$name', price='$price' ,quantity='$quant' WHERE product_id='$id'");

    header("Location: table.php");
}

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM product WHERE product_id=" . $_GET['id']);

    $row = mysqli_fetch_array($result);

    if ($row) {
        $id = $row['product_id'];
        $name = $row['product_name'];
        $price = $row['price'];
        $quant = $row['quantity'];
    } else {
        echo "No results!";
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Edit Item</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        table {
            margin: 0 auto;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 5px 10px;
            border-radius: 3px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            margin-top: 10px;
        }

        @media (max-width: 576px) {
            body {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <table>
            <tr>
                <td colspan="2">Edit Records</td>
            </tr>

            <tr>
                <td>Item Name</td>
                <td>
                    <input type="text" name="product_name" value="<?php echo $name; ?>" />
                </td>
            </tr>

            <tr>
                <td>Price</td>
                <td>
                    <input type="text" name="price" value="<?php echo $price; ?>" />
                </td>
            </tr>

            <tr>
                <td>Quantity</td>
                <td>
                    <input type="text" name="quantity" value="<?php echo $quant; ?>" />
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Confirm Edit ✔️">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

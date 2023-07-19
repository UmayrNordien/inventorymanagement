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
                    <label>
                        <input type="text" name="product_name" value="<?php echo $name; ?>" />
                    </label>
                </td>
            </tr>

            <tr>
                <td>Price</td>
                <td>
                    <label>
                        <input type="text" name="price" value="<?php echo $price; ?>" />
                    </label>
                </td>
            </tr>

            <tr>
                <td>Quantity</td>
                <td>
                    <label>
                        <input type="text" name="quantity" value="<?php echo $quant; ?>" />
                    </label>
                </td>
            </tr>

            <tr>
                <td>
                    <label>
                        <input type="submit" name="submit" value="Confirm Edit ✔️">
                    </label>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
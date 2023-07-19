<!-- PHP script 1 - connection error handling -->
<?php
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL database " . mysqli_connect_error();
    }
?>

<!-- PHP script 2 -->
<?php
if (isset($_GET['id'])) {
    //selecting product table and deleting record
    $result = mysqli_query($db,"DELETE FROM product WHERE product_id=".$_GET['id']);

if($result==true)
	echo "success";
    header("Location:table.php");
}
?>
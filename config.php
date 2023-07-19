<?php
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to the MySQL database: " . mysqli_connect_error();
    }
?>
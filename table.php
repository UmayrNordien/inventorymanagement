<!-- PHP 1 -->
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

<!-- HTML 1 -->
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Inventory Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="page-container">

<!-- Navigation -->
<div class="sidebar-menu">
<div class="sidebar-header">
<div class="logo">
<a href="index.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
</div>
</div>

<div class="main-menu">
<div class="menu-inner">
<nav>
<ul class="metismenu" id="menu">
<li>
<a href="index.php" aria-expanded="true"><span>dashboard</span></a>
</li>
<li class="active">
<a href="table.php" aria-expanded="true">
<span>Item Records</span></a>
</li>
</ul>
</nav>
</div>
</div>
</div>

<div class="main-content">
<!-- Header -->
<div class="header-area">
<div class="row align-items-center">
<!-- nav and search button -->
<div class="col-md-6 col-sm-8 clearfix">
<div class="nav-btn pull-left">
<span></span>
<span></span>
<span></span>
</div>
<div class="search-box pull-left">
<form action="#">
<input type="text" name="search" placeholder="Search..." required>
<i class="ti-search"></i>
</form>
</div>
</div>

<!-- profile info & task notification-->
<div class="col-md-6 col-sm-4 clearfix">

</div>
</div>
</div>


<!-- page title area start -->
<div class="page-title-area">
<div class="row align-items-center">
<div class="col-sm-6">
<div class="breadcrumbs-area clearfix">
<h4 class="page-title pull-left">Dashboard</h4>
<ul class="breadcrumbs pull-left">
<li><a href="index.php">Home</a></li>
<li><span>Item Records</span></li>
</ul>
</div>
</div>
<div class="col-sm-6 clearfix">
<div class="user-profile pull-right">
<img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
<h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?> <i class="fa fa-angle-down"></i></h4>
<div class="dropdown-menu">

<a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
</div>
</div>
</div>
</div>
</div>

<div>
    <hr>

<h1 style="text-align:center">Add Item Here</h1>
<body>
<form method="POST" class="form-inline" action="additem.php">
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
</body>
<div class="main-content-inner">
<div class="row">

<!-- Contextual Classes start -->
<div class="col-lg-6 mt-5">
<div class="card">
<div class="card-body">
<h4 class="header-title">Products</h4>
<div class="single-table">
<div class="table-responsive">
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
        $count = $count + 1;
        ?>


<tr>
<th><?php echo $count ?></th>
<th><?php echo $row["product_name"] ?></th>
<th><?php echo $row["price"] ?></th>
<th><?php echo $row["quantity"] ?></th>

<!-- delete product by selecting from the product table via running the function in delete.php -->
<th><a href="up"Edit</a><a href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a> <a href="up"Edit</a><a href="deleteitem.php?id=<?php echo $row["product_id"] ?>">Delete</a></th>
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
<div>


</div>
</div>

<html>
<head>
<title>Add Item</title>
</head>

</html>
</div> <!-- Page container -->
</body>

</html>

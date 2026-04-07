<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
body{
background:#111;
color:white;
font-family:Poppins;
}
.container{
padding:30px;
}
a{
color:#00f2fe;
text-decoration:none;
margin:10px;
}
.card{
background:#222;
padding:20px;
border-radius:10px;
margin:10px 0;
}
</style>
</head>
<body>

<div class="container">

<h1>Admin Dashboard</h1>

<a href="add_product.php">➕ Add Product</a>
<a href="logout.php">🚪 Logout</a>

<h2>All Products</h2>

<?php
$result = $conn->query("SELECT * FROM products");

while ($row = $result->fetch_assoc()) {
?>

<div class="card">
<b><?php echo $row['name']; ?></b><br>
₹<?php echo $row['price']; ?><br>

<a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>
<a href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a>
</div>

<?php
}?>

</div>

</body>
</html>
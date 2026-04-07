<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $conn->query("INSERT INTO products(name,price,image) VALUES('$name','$price','$image')");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>

<style>
body{
margin:0;
font-family:Poppins;
background:linear-gradient(135deg,#667eea,#764ba2);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

/* Glass Card */
.card{
background:rgba(255,255,255,0.1);
backdrop-filter:blur(15px);
padding:30px;
border-radius:15px;
width:300px;
text-align:center;
color:white;
box-shadow:0 0 30px rgba(0,0,0,0.3);
}

/* Inputs */
input{
width:100%;
padding:12px;
margin:10px 0;
border:none;
border-radius:8px;
outline:none;
}

/* Button */
button{
width:100%;
padding:12px;
border:none;
border-radius:25px;
background:linear-gradient(45deg,#ff416c,#ff4b2b);
color:white;
font-size:16px;
cursor:pointer;
transition:0.3s;
}

button:hover{
transform:scale(1.05);
}

/* Back link */
a{
display:block;
margin-top:15px;
color:#00f2fe;
text-decoration:none;
}
</style>

</head>

<body>

<div class="card">

<h2>➕ Add Product</h2>

<form method="POST">

<input type="text" name="name" placeholder="Product Name" required>

<input type="number" name="price" placeholder="Price" required>

<input type="text" name="image" placeholder="Image URL" required>

<button name="add">Add Product</button>

</form>

<a href="dashboard.php">⬅ Back to Dashboard</a>

</div>

</body>
</html>
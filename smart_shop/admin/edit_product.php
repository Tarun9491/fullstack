<?php
session_start();
include "../db.php";

$id = $_GET['id'];

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $conn->query("UPDATE products SET name='$name', price='$price' WHERE id=$id");
    header("Location: dashboard.php");
}

$data = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
?>

<form method="POST">
<input value="<?php echo $data['name']; ?>" name="name"><br>
<input value="<?php echo $data['price']; ?>" name="price"><br>
<button name="update">Update</button>
</form>
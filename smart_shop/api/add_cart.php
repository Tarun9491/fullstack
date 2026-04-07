<?php
session_start();
include "../db.php";

$data = json_decode(file_get_contents("php://input"), true);

$product_id = $data['product_id'];
$user_id = $_SESSION['user_id']; // 🔥 important

if ($product_id > 0) {

    $check = $conn->query("SELECT * FROM cart WHERE product_id='$product_id' AND user_id='$user_id'");

    if ($check->num_rows > 0) {
        $conn->query("UPDATE cart SET qty = qty + 1 WHERE product_id='$product_id' AND user_id='$user_id'");
    } else {
        $conn->query("INSERT INTO cart(product_id, qty, user_id) VALUES('$product_id', 1, '$user_id')");
    }

    echo "success";
}
?>
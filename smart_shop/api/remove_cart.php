<?php
session_start();
include "../db.php";

if (!isset($_SESSION['user_id'])) {
    echo "login_required";
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$product_id = $data['product_id'] ?? 0;
$user_id = $_SESSION['user_id'];

if ($product_id > 0) {
    $conn->query("
        DELETE FROM cart
        WHERE product_id = '$product_id'
        AND user_id = '$user_id'
    ");

    echo "removed";
} else {
    echo "error";
}
?>
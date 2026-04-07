<?php

include "db.php";

$user_id = 1;

$result = $conn->query("
SELECT products.price, cart.qty
FROM cart
JOIN products ON cart.product_id = products.id
");

$total = 0;

while($row = $result->fetch_assoc()){

$total += $row['price'] * $row['qty'];

}

$conn->query("INSERT INTO orders(user_id,total) VALUES($user_id,$total)");

$conn->query("DELETE FROM cart WHERE user_id=$user_id");

header("Location: payment_success.php");

?>
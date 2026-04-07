<?php
session_start();
include "db.php";

// check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// fetch only current user's cart items
$result = $conn->query("
SELECT products.name, products.price, cart.qty
FROM cart
JOIN products ON cart.product_id = products.id
WHERE cart.user_id = '$user_id'
");

$total = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="mb-4">Checkout</h2>

        <table class="table table-bordered">

            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>

            <?php if ($result->num_rows > 0) { ?>

                <?php while ($row = $result->fetch_assoc()) {

                    $item_total = $row['price'] * $row['qty'];
                    $total += $item_total;
                    ?>

                    <tr>
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>₹
                            <?php echo $row['price']; ?>
                        </td>
                        <td>
                            <?php echo $row['qty']; ?>
                        </td>
                        <td>₹
                            <?php echo $item_total; ?>
                        </td>
                    </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="4" class="text-center">
                        Your cart is empty
                    </td>
                </tr>

            <?php } ?>

        </table>

        <h3>Total Payment: ₹
            <?php echo $total; ?>
        </h3>

        <?php if ($total > 0) { ?>
            <form action="save_order.php" method="POST">
                <button type="submit" class="btn btn-success mt-3">
                    💳 Pay Now
                </button>
            </form>
        <?php } ?>

    </div>

</body>

</html>
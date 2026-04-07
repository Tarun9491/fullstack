<?php
session_start();
include "db.php";

// check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// fetch only current user's cart
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

    <title>Invoice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
        }

        .invoice-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .invoice-title {
            font-weight: bold;
            color: #333;
        }

        .total-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
        }

        .checkout-btn {
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            border: none;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
        }

        .checkout-btn:hover {
            transform: scale(1.05);
        }
    </style>

</head>

<body>

    <div class="container mt-5">

        <div class="invoice-box">

            <h2 class="invoice-title text-center mb-4">🧾 Order Invoice</h2>

            <table class="table table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if ($result->num_rows > 0) { ?>

                        <?php while ($row = $result->fetch_assoc()) {

                            $item = $row['price'] * $row['qty'];
                            $total += $item;

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
                                    <?php echo $item; ?>
                                </td>

                            </tr>

                        <?php } ?>
                    <?php } else { ?>

                        <tr>
                            <td colspan="4" class="text-center">Your cart is empty</td>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>

            <div class="total-box text-end">

                <h4>Total Payment: ₹
                    <?php echo $total; ?>
                </h4>

            </div>

            <div class="text-center mt-4">

                <a href="checkout.php" class="checkout-btn">
                    Proceed to Checkout
                </a>

                <button onclick="window.print()" class="btn btn-success ms-3">
                    Print Invoice
                </button>
                <button class="remove-btn" onclick="removeCart(<?php echo $row['id']; ?>)">
                    🗑️ Remove
                </button>

            </div>

        </div>

    </div>

</body>

</html>
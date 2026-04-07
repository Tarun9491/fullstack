<?php
session_start();
include "db.php";

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch products
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>

<head>
    <title>SmartShop</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- NAVBAR -->
    <header>
        <h2>🛒 SmartShop</h2>

        <nav>
            <a href="index.php">Home</a>
            <a href="#products">Products</a>
            <a href="#">Offers</a>
            <a href="cart.php">Cart</a>

            <?php if (isset($_SESSION['user_id'])) { ?>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            <?php } else { ?>
                <a href="login.php">Login</a>
            <?php } ?>
        </nav>
    </header>

    <!-- HERO -->
    <section class="hero">
        <h1>Discover Amazing Products</h1>
        <p>Shop the best gadgets at best price</p>

        <button onclick="document.getElementById('products').scrollIntoView()">
            🔥 Shop Now
        </button>
    </section>

    <!-- PRODUCTS -->
    <h2 class="title" id="products">🔥 Trending Products</h2>

    <section class="products">

        <?php if ($result->num_rows > 0) { ?>

            <?php while ($row = $result->fetch_assoc()) { ?>

                <div class="card">

                    <img src="<?php echo $row['image']; ?>" alt="product" class="product-image" onclick="openImage(this.src)">

                    <h3>
                        <?php echo $row['name']; ?>
                            </h3>
                    <p>₹
                                <?php echo $row['price']; ?>
                    </p>
                    <button onclick="addCart(<?php echo $row['id']; ?>)">
                                🛒 Add to Cart
                    </button>

                    </div>

                <?php } ?>

    <?php } else { ?>

                <p style="text-align:center;">No products available</p>

        <?php } ?>

    </section>

    <!-- CART -->
    <section class="cart">
        <h2>🧾 Your Cart</h2>
        <a href="cart.php" class="checkout-btn">Go to Cart</a>
    </section>

    <!-- IMAGE MODAL -->
    <div id="imageModal" class="image-modal" onclick="closeImage()">
        <span class="close-btn">&times;</span>
        <img id="fullImage" class="full-image">
    </div>

    <!-- FOOTER -->
    <footer>
        <p>© 2026 SmartShop | Designed by Tarun 🚀</p>
    </footer>

    <!-- JS -->
    <script src="js/cart.js"></script>

    <script>
        function openImage(src) {
            document.getElementById("imageModal").style.display = "flex";
            document.getElementById("fullImage").src = src;
        }

        function closeImage() {
            document.getElementById("imageModal").style.display = "none";
        }
    </script>

</body>

</html>
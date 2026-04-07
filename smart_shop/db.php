<?php

$conn = new mysqli("localhost", "root", "Tarun@123", "smart_shop", 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
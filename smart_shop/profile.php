<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];
$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* BACKGROUND */
body{
margin:0;
font-family:Poppins;
color:white;

background: linear-gradient(135deg,#1e3c72,#2a5298);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

/* CARD */
.profile-card{
background: rgba(255,255,255,0.1);
backdrop-filter: blur(15px);
padding:40px;
border-radius:20px;
text-align:center;
width:350px;
box-shadow:0 10px 30px rgba(0,0,0,0.4);
}

/* AVATAR */
.avatar{
width:100px;
height:100px;
border-radius:50%;
margin-bottom:15px;
border:3px solid white;
}

/* TEXT */
h2{
margin-bottom:10px;
}

.info{
margin:10px 0;
font-size:18px;
}

/* BUTTON */
.btn-logout{
margin-top:20px;
padding:10px 20px;
border:none;
border-radius:25px;
background:linear-gradient(45deg,#ff416c,#ff4b2b);
color:white;
font-weight:bold;
cursor:pointer;
}

.btn-logout:hover{
opacity:0.8;
}

</style>

</head>

<body>

<div class="profile-card">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="avatar">

<h2><?php echo $user['name']; ?></h2>

<p class="info">📧 <?php echo $user['email']; ?></p>

<a href="logout.php">
<button class="btn-logout">Logout</button>
</a>

</div>

</body>
</html>
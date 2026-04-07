<?php
include "db.php";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn->query("INSERT INTO users(name,email,password) VALUES('$name','$email','$password')");

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Register</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:Poppins;
height:100vh;

/* COLORFUL GRADIENT */
background:linear-gradient(135deg,#ff758c,#ff7eb3,#667eea);
display:flex;
justify-content:center;
align-items:center;
}

/* GLASS CARD */

.register-box{
background:rgba(255,255,255,0.1);
backdrop-filter:blur(15px);
padding:40px;
border-radius:20px;
box-shadow:0 10px 40px rgba(0,0,0,0.4);
width:320px;
text-align:center;
color:white;
}

/* INPUTS */

input{
width:100%;
padding:12px;
margin:10px 0;
border:none;
border-radius:10px;
outline:none;
}

/* BUTTON */

button{
width:100%;
padding:12px;
border:none;
border-radius:30px;
background:linear-gradient(45deg,#36d1dc,#5b86e5);
color:white;
font-weight:bold;
cursor:pointer;
transition:0.3s;
}

button:hover{
transform:scale(1.05);
background:linear-gradient(45deg,#ff416c,#ff4b2b);
}

/* LINK */

a{
color:white;
font-size:14px;
}

</style>

</head>

<body>

<div class="register-box">

<h2>📝 Create Account</h2>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>

</form>

<br>

<a href="login.php">Already have an account? Login</a>

</div>

</body>
</html>
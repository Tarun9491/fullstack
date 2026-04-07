<?php
session_start();
include "../db.php";

if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $result = $conn->query("SELECT * FROM admin WHERE username='$u' AND password='$p'");

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
    }
    else {
        echo "<script>alert('Invalid Admin Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body{
background:linear-gradient(135deg,#667eea,#764ba2);
display:flex;
justify-content:center;
align-items:center;
height:100vh;
color:white;
font-family:Poppins;
}
.box{
background:rgba(255,255,255,0.1);
padding:30px;
border-radius:15px;
text-align:center;
}
input{
margin:10px;
padding:10px;
width:200px;
border:none;
border-radius:5px;
}
button{
padding:10px 20px;
background:#ff416c;
border:none;
color:white;
border-radius:5px;
}
</style>
</head>
<body>

<div class="box">
<h2>Admin Login</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<button name="login">Login</button>
</form>

</div>

</body>
</html>

<?php
include "db.php";
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$password'");

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    }
    else {
        $error = "Invalid Login!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:Poppins;
height:100vh;

/* COLORFUL GRADIENT BACKGROUND */
background:linear-gradient(135deg,#667eea,#764ba2,#ff758c);
display:flex;
justify-content:center;
align-items:center;
}

/* GLASS CARD */

.login-box{
background:rgba(255,255,255,0.1);
backdrop-filter:blur(15px);
padding:40px;
border-radius:20px;
box-shadow:0 10px 40px rgba(0,0,0,0.4);
width:300px;
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
background:linear-gradient(45deg,#ff416c,#ff4b2b);
color:white;
font-weight:bold;
cursor:pointer;
transition:0.3s;
}

button:hover{
transform:scale(1.05);
background:linear-gradient(45deg,#36d1dc,#5b86e5);
}

/* ERROR */

.error{
color:#ffcccb;
margin-bottom:10px;
}

a{
color:#fff;
font-size:14px;
}

</style>

</head>

<body>

<div class="login-box">

<h2>🔐 Login</h2>

<?php if (isset($error)) { ?>
<p class="error"><?php echo $error; ?></p>
<?php
}?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

<br>

<a href="register.php">Create Account</a>

</div>

</body>
</html>
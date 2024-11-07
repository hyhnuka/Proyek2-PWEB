<?php

require 'function.php';

if (isset($_POST["register"])){
//var_dump($_POST);

    if (registrasi($_POST) > 0 ){
        echo "<script>
        alert('Registration successful!');
        window.location.href = 'login.php';
      </script>";
 
    }else {
    echo "<script>alert('Registration failed! Check your input password');</script>";
 
    echo mysqli_error($conn);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="styleregist.css">
</head>
<body>
<section class="regist">
    <div class="regist-container">
        <h1>Registrasi</h1>
        <form action="" method="post">
            <div class="input-box">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-box">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="input-box">
                <label for="password2">Confirm Password</label>
                <input type="password" id="password2" name="password2" placeholder="Confirm password" required>
            </div>
            <button type="submit" name="register">Sign Up</button>
        </form>
    </div>
</section>
</body>
</html>

<!-- 
Username terdaftar
zaza:123 
baba:345
hnuka_:291204
 -->

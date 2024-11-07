<?php
if (isset($_COOKIE['login'])){
    if ($_COOKIE['login'] == true){
        $_SESSION['login'] == true;
    }
}

session_start();
if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
require 'function.php';


if (isset($_POST["login"])){
    //var_dump($_POST);
    
        $username = $_POST["username"];
        $password = $_POST["password"];

        //cek username sama kayak registrasi
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        
        if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('Username not found!');</script>";
            

            $cek_pass = mysqli_fetch_assoc($result);

              // Cek password dengan password yang di-hash
            if (password_verify($password, $cek_pass["password"])) {

                $_SESSION["login"] = true;
                //$_SESSION["username"] = $username;
                // Login berhasil, arahkan ke index.php
                header("Location: index.php");
                exit; // Menghentikan eksekusi skrip setelah redirect

                    if (isset($_POST['remember'])){
                        setcookie('login', 'true', time()+60);
                    }
            }
        else {
            // Password salah
            echo "<script>alert('Wrong Pasword!');</script>";
            }
        }else {
            // Username tidak ditemukan
            echo "<script>alert('Username not found!');</script>"; 
        }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="stylelogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section class="login">
        <div class="login-container">
            <h1>Login</h1>
            <form action="" method="post">
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="rememberme">
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember"> Remember me
                    </label>
                </div>
                <button type="submit" name="login">Sign in</button>
                <button type="button" onclick="window.location.href='registrasi.php';">Sign up</button>
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
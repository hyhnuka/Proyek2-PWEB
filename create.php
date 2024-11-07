<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
require "function.php";
//buat submit terus ke database
if (isset($_POST["submit"])){
   
   if (create($_POST) > 0 ){
    echo "<script>
    alert('Data added successful!');
    window.location.href = 'index.php';
  </script>";

   }else {
    echo "<script>alert('Failed to add data');</script>";
    echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CREATE CUSTOMER</title>
        <link rel="stylesheet" href="stylecreate.css">
    </head>
    <body>
    <section class="create">
        <h1>Informasi Customer</h1>

        <form action="" method = "post" enctype = "multipart/form-data">

        <div>  
            <label for="nama_cust"> Nama Customer :  </label>
            <input type="text" name="nama_cust" id="nama_cust" required>
        </div>
        <br>
        <div>
            <label for="id_cust"> ID Customer :  </label>
            <input type="text" name="id_cust" id="id_cust" required>
        </div>
        <br>
        <div>
            <label for="alamat"> Alamat :  </label>
            <input type="text" name="alamat" id="alamat" required>
        </div>
        <br>
        <div>
            <label for="gender"> Jenis Kelamin (L/P) :  </label>
            <input type="text" name="gender" id="gender" required>
        </div>
        <br>
        <div>
            <label for="no_hp"> No Hp :  </label>
            <input type="text" name="no_hp" id="no_hp" required>
        </div>
        <br>
        <div>
            <label for="gambar"> Bukti Pembayaran :  </label>
            <input type="file" name="gambar" id="gambar" required>
        </div>

        <br>
        <button type="submit" name="submit">submit</button>

        </form>

</section>
</body>
</html>
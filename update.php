<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
require "function.php";

$id_cust = $_GET["idcustomer"];
// var_dump('$id');

$data_cust = query ("SELECT * FROM customer WHERE ID_customer = '$id_cust'")[0];

//buat submit ke database
if (isset($_POST["submit"])){
    //var_dump($_POST);
   if (update($_POST) > 0 ){
    echo "<script>
                alert('Data update successful!');
                window.location.href = 'index.php';
              </script>";
   }else {
    echo "Failed to update data!";
   }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer Infor</title>
        <link rel="stylesheet" href="styleupdate.css">

    </head>
    <body>
    <section class="update">
        <h1>Informasi Customer</h1>
        <form action="" method = "post" enctype="multipart/form-data">
        <div>
            <label for="id_cust"> ID Customer :  </label>
            <input type="text" name="id_cust" id="id_cust" value="<?php echo $data_cust["ID_customer"]; ?>" disabled>
            <br>
            <small style="color: beige; font-size:medium">ID Customer tidak dapat diubah karena merupakan primary key.</small>
        </div>
        <div>  
            <label for="nama_cust"> Nama Customer :  </label>
            <input type="text" name="nama_cust" id="nama_cust" required value= "<?php echo $data_cust["Nama_customer"]; ?>" >
        </div>
        <br>
        <div>
            <label for="alamat"> Alamat :  </label>
            <input type="text" name="alamat" id="alamat" value="<?php echo $data_cust["Alamat"]; ?>">
        </div>
        <br>
        <div>
            <label for="gender"> Jenis Kelamin:  </label>
            <input type="text" name="gender" id="gender" value="<?php echo $data_cust["Jenis_kelamin"]; ?>">
        </div>
        <br>
        <div>
            <label for="no_hp"> No Hp :  </label>
            <input type="text" name="no_hp" id="no_hp" value="<?php echo $data_cust["No_hp"]; ?>" >
        </div>
        <br>
        <div>
            <label for="gambar"> Bukti Pembayaran :  </label>
            <input type="file" name="gambar" id="gambar">
            <input type="hidden" name="gambarLama" value="<?php echo $data_cust['Bukti']; ?>">
        </div>

        <br>
        <button type="submit" name="submit">submit</button>

        </form>
    
    </section>     
    </body>
</html>
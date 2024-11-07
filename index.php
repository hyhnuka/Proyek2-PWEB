<?php

session_start();

if (!isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

require 'function.php';
$data_cust = query("SELECT * FROM customer");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

  
</head>

<!--- READ CUSTOMER --->
<body>
<!-- <a href = "logout.php">LOGOUT</a> -->

<section class="customer">
<h1>Data Customer</h1>
<div class="view">
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID Customer</th>
        <th>Nama Customer</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>No Handphone</th>
        <th>Bukti Pembayaran</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <!-- while( $row_cust = mysqli_fetch_assoc($result_cust)) : -->
   
    <?php foreach ($data_cust as $row_cust) : ?> 

    <tr>
        <td><?php echo $row_cust ["ID_customer"]?></td>
        <td><?php echo $row_cust ["Nama_customer"]?></td>
        <td><?php echo $row_cust ["Alamat"]?></td>
        <td><?php echo $row_cust ["Jenis_kelamin"]?></td>
        <td><?php echo $row_cust ["No_hp"]?></td>
        <td>
            <a href="bukti/<?php echo $row_cust["Bukti"]; ?>" download>
            <img src="bukti/<?php echo $row_cust ["Bukti"]?>" width = "80">
            <br>
            <button type="unduh" name="unduh" class="unduh"> <a href="bukti/<?php echo $row_cust["Bukti"]; ?>" download>download</button>
        </td>

        <td>
            <a href="update.php?idcustomer=<?php echo $row_cust["ID_customer"]; ?>" class="btn update">UPDATE</a>
        </td>
        <td>
            <a href="delete.php?idcustomer=<?php echo $row_cust["ID_customer"]; ?>" class="btn delete">DELETE</a>
        </td>
    </tr>
    
    <?php endforeach; ?>

</table>
<br>
<a href="create.php" class="btn_add"><i class='bx bx-user-plus' style='font-size: 40px;'></i> ADD CUSTOMER</a>
<a href = "home.php" class="btn_home"><i class='bx bx-home' style='font-size: 40px;' ></i></a>

</div>
</section>
</body>

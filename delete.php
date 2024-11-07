<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
require "function.php";

$id_cust = $_GET["idcustomer"];

if (delete($id_cust) > 0){
    echo "<script>
    alert('Data has been deleted!');
    window.location.href = 'index.php';
  </script>";
   
}else {
    echo "<script>
    alert('Failed to delete data!');
    window.location.href = 'index.php';
  </script>";
 header("Location: index.php");
    exit;
}
?>
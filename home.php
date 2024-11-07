
<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Menu Utama</title>
	    <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    </head>
    <body>
    <section class="home">
        <div class="home-container">
            <h1>MENU</h1>
        
                <div class="input-box">
                    <i class='bx bx-list-ul'style="font-size: 100px"></i>
                    <label for="view"><a href="index.php"> LIST CUSTOMER</a></label>
                </div>

                <div class="input-box">
                    <i class='bx bx-user-plus'style="font-size: 100px"></i>
                    <label for="create"><a href="create.php"> ADD CUSTOMER</a></label>
                </div>

                <div class="input-box">
                    <i class='bx bx-log-out'style="font-size: 100px"></i>
                    <label for="exit"><a href="logout.php"> LOG OUT</a></label>
                </div>

    </section>
    </body>
</html>
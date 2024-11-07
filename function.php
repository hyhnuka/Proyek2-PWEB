<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "cafe";

// Buat koneksi
$conn = mysqli_connect($hostname, $username, $password, $database_name);

// Periksa koneksi
if ($conn->connect_error) {
    echo "Tidak dapat terhubung ke database";
    die("Connection failed: " . $conn->connect_error);
}
function query ($query){
    global $conn;
    $result_cust = mysqli_query($conn, $query);
    $rows = [];
    while( $row =  mysqli_fetch_assoc($result_cust)){
        $rows[] = $row;
    } 
    return $rows; // Mengembalikan array hasil

}


function create ($data_cust){
    global $conn;
    $id_cust = $_POST["id_cust"];
    $nama_cust = $_POST["nama_cust"];
    $alamat_cust = $_POST["alamat"];
    $gender_cust = $_POST["gender"];
    $nohp_cust = $_POST["no_hp"];
    // $gambar = $_FILES["gambar"];

    //upload
    $gambar = upload();
    if (!$gambar){
        return false;
    }


    $query = "INSERT INTO customer VALUES ('$id_cust', '$nama_cust', '$alamat_cust', '$ $gender_cust','  $nohp_cust', '$gambar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload(){
    $filegambar = $_FILES['gambar']['name'];
    $sizegambar = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tempName = $_FILES['gambar']['tmp_name'];


    $extensivalid = ['jpg', 'jpeg', 'png'];
    $extensifile = explode ('.', $filegambar);
    // $extensifile = end($extensifile);
    $extensifile = strtolower(end($extensifile));

    if (!in_array($extensifile, $extensivalid)) {
        echo "<script>alert('File extension must be jpg, jpeg, or png');</script>";
        return false;
    }

    // Cek ukuran file (misalnya maksimum 2MB)
    if ($sizegambar > 2000000) {
        echo "<script>alert('File size is too large');</script>";
        return false;
    }

    move_uploaded_file($tempName, 'bukti/' . $filegambar);
    return $filegambar;

}

function delete($id_cust){
    global $conn;
    mysqli_query($conn, "DELETE FROM customer WHERE ID_customer = '$id_cust'");
    return mysqli_affected_rows($conn);
}

function update($data_cust) {
    global $conn;

    $id_cust = $_POST["id_cust"];
    $nama_cust = $_POST["nama_cust"];
    $alamat_cust = $_POST["alamat"];
    $gender_cust = $_POST["gender"];
    $nohp_cust = $_POST["no_hp"];
    $gambarLama = $_POST["gambarLama"];

    if ($_FILES['gambar']['error']=== 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE customer SET 
                ID_customer = '$id_cust', 
                Nama_customer = '$nama_cust', 
                Alamat = '$alamat_cust', 
                Jenis_kelamin = '$gender_cust', 
                No_hp = '$nohp_cust',
                Bukti = '$gambar'
              WHERE ID_customer = '$id_cust'";
    
    // Eksekusi query dan cek jika ada error
    if (!mysqli_query($conn, $query)) {
        echo "Error: " . mysqli_error($conn);
    }
    
    return mysqli_affected_rows($conn);
}


function registrasi($data_cust){
    global $conn;
    $username = strtolower(stripslashes($data_cust["username"]));
    $password = mysqli_real_escape_string($conn, $data_cust["password"]);
    $password2 = mysqli_real_escape_string($conn, $data_cust["password2"]);
    $email = mysqli_real_escape_string($conn, $data_cust["email"]);


    //tidak boleh beda 
    if ($password !== $password2) {
        
        return false;
    }

    // Hash password sebelum disimpan
     $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password); die;

    // Cek apakah username sudah ada
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    
        if (mysqli_num_rows($result) > 0) {
            echo  "<script>alert('Username has been registered!');</script>";
            return 0;
        }

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$email')");

    //return 1;
    return mysqli_affected_rows($conn);
}

?>


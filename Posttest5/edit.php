<?php
require 'koneksi.php';

$id_barang = $_GET['id_barang'];

if (isset($_POST['update'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $alamat_pembeli = $_POST['alamat_pembeli'];
    $no_hp_pembeli = $_POST['no_hp_pembeli'];

    $query = "UPDATE cart SET 
                jumlah_barang = '$jumlah_barang', 
                alamat_pembeli = '$alamat_pembeli',
                no_hp_pembeli = '$no_hp_pembeli'
              WHERE id_barang = '$id_barang'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
            <script>
                alert('Data berhasil di update!');
                document.location.href = 'cart.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal di update!');
                document.location.href = 'edit.php?id_barang=$id_barang';
            </script>
        ";
    }
}

$query = "SELECT * FROM cart WHERE id_barang = '$id_barang'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/beli.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
    <title>Edit Barang</title>
</head>
<body>
    <div class="back-container">
        <div class="head-container">
            <h1>Ubah Pesanan Anda</h1>
        </div>
        <form action="" method="POST"> 
            <p>Nama Produk: <?php echo $row['nama_produk']; ?></p>
            <p>Harga: Rp <?php echo number_format($row['harga']); ?></p>
         
            <label for="jumlah_barang">Jumlah Barang:</label>
            <input type="number" id="jumlah_barang" name="jumlah_barang" value="<?php echo $row['jumlah_barang']; ?>" required>

            <label for="alamat_pembeli">Alamat Pembeli:</label>
            <input type="text" id="alamat_pembeli" name="alamat_pembeli" value="<?php echo $row['alamat_pembeli']; ?>" required>

            <label for="no_hp_pembeli">No HP:</label>
            <input type="text" id="no_hp_pembeli" name="no_hp_pembeli" value="<?php echo $row['no_hp_pembeli']; ?>" required>

            <button type="submit" name="update">Submit Update</button>
        </form>
    </div>
</body>
</html>

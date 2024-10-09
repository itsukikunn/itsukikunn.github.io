<?php
require 'koneksi.php';

if (isset($_POST['beli'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $alamat_pembeli = $_POST['alamat_pembeli'];
    $no_hp_pembeli = $_POST['no_hp_pembeli'];

    $query = "INSERT INTO cart ( nama_produk, harga, jumlah_barang, alamat_pembeli, no_hp_pembeli) 
              VALUES ('$nama_produk', '$harga', '$jumlah_barang', '$alamat_pembeli', '$no_hp_pembeli')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
            <script>
                alert('Berhasil menambah pesanan!');
                document.location.href = 'user.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menambah pesanan: " . mysqli_error($conn) . "');
                document.location.href = 'user.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "styles/beli.css">
    <title>Order</title>
</head>
<body>
    <div class = "back-container">
        <div class = "head-container">
            <h1>Order Pesanan</h1>
        </div>
    <form action="" method="POST">
        <p>Nama Produk: <?php echo isset($_POST['nama_produk']) ? $_POST['nama_produk'] : 'Produk tidak tersedia'; ?></p>
        <p>Harga: Rp <?php echo isset($_POST['harga']) ? number_format($_POST['harga']) : '0'; ?></p>
        
        <input type="hidden" name="nama_produk" value="<?php echo isset($_POST['nama_produk']) ? $_POST['nama_produk'] : ''; ?>">
        <input type="hidden" name="harga" value="<?php echo isset($_POST['harga']) ? $_POST['harga'] : 0; ?>">
        
        <label for="jumlah_barang">Jumlah Barang:</label>
        <input type="number" id="jumlah_barang" name="jumlah_barang" required>

        <label for="alamat_pembeli">Alamat Pembeli:</label>
        <input type="text" id="alamat_pembeli" name="alamat_pembeli" required>

        <label for="no_hp_pembeli">No HP:</label>
        <input type="text" id="no_hp_pembeli" name="no_hp_pembeli" required>

        <button type="submit" name="beli">Submit Order</button>
    </form>
    </div>
</body>
</html>
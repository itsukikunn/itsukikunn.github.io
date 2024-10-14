<?php
require 'koneksi.php';

$id_barang = $_GET['id_barang'];

$query = "SELECT * FROM cart WHERE id_barang = '$id_barang'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $jumlah_barang = $_POST['jumlah_barang'];
    $alamat_pembeli = $_POST['alamat_pembeli'];
    $no_hp_pembeli = $_POST['no_hp_pembeli'];

    $file_name = $row['foto_pembeli']; 

    if (!empty($_FILES['foto']['name'])) {
        $tmp_name = $_FILES['foto']['tmp_name'];
        $file_size = $_FILES['foto']['size']; // Dapatkan ukuran file
        $fileExt = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

        $validExt = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
        
        if ($file_size > 2 * 1024 * 1024) {
            echo "
                <script>
                    alert('Ukuran file terlalu besar, Max 2MB');
                    document.location.href = 'edit.php?id_barang=$id_barang';
                </script>
            ";
            exit;
        }

        if (in_array($fileExt, $validExt)) {
            if (file_exists('img/' . $row['foto_pembeli'])) {
                unlink('img/' . $row['foto_pembeli']);
            }
            
            $new_file_name = date('Y-m-d H.i.s') . '.' . $fileExt;

            move_uploaded_file($tmp_name, 'img/' . $new_file_name);
            $file_name = $new_file_name;
        } else {
            echo "
                <script>
                    alert('File yang diupload bukan gambar!');
                    document.location.href = 'edit.php?id_barang=$id_barang';
                </script>
            ";
            exit;
        }
    }

    $updateQuery = "UPDATE cart SET 
                jumlah_barang = '$jumlah_barang', 
                alamat_pembeli = '$alamat_pembeli',
                no_hp_pembeli = '$no_hp_pembeli',
                foto_pembeli = '$file_name'
              WHERE id_barang = '$id_barang'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "
            <script>
                alert('Data berhasil diupdate!');
                document.location.href = 'cart.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diupdate: " . mysqli_error($conn) . "');
                document.location.href = 'edit.php?id_barang=$id_barang';
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
        <form action="" method="POST" enctype="multipart/form-data"> 
            <p>Nama Produk: <?php echo htmlspecialchars($row['nama_produk']); ?></p>
            <p>Harga: Rp <?php echo number_format($row['harga']); ?></p>
         
            <label for="jumlah_barang">Jumlah Barang:</label>
            <input type="number" id="jumlah_barang" name="jumlah_barang" value="<?php echo $row['jumlah_barang']; ?>" required>

            <label for="alamat_pembeli">Alamat Pembeli:</label>
            <input type="text" id="alamat_pembeli" name="alamat_pembeli" value="<?php echo htmlspecialchars($row['alamat_pembeli']); ?>" required>

            <label for="no_hp_pembeli">No HP:</label>
            <input type="text" id="no_hp_pembeli" name="no_hp_pembeli" value="<?php echo htmlspecialchars($row['no_hp_pembeli']); ?>" required>

            <label for="foto">Upload Gambar Baru(Opsional):</label>
            <input type="file" name="foto" id="foto">

            <img src="img/<?php echo $row['foto_pembeli']; ?>" alt="Gambar Produk" width="100" height="100">

            <button type="submit" name="update">Submit Update</button>
        </form>
    </div>
</body>
</html>
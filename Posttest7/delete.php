<?php
require 'koneksi.php';

$id_barang = $_GET['id_barang'];

$query = "SELECT foto_pembeli FROM cart WHERE id_barang = '$id_barang'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $file_name = $row['foto_pembeli'];
    
    $deleteQuery = "DELETE FROM cart WHERE id_barang = '$id_barang'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        if (file_exists('img/' . $file_name)) {
            unlink('img/' . $file_name);
        }
        echo "
            <script>
                alert('Berhasil menghapus barang dari keranjang!');
                document.location.href = 'cart.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menghapus barang dari keranjang!');
                document.location.href = 'cart.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('Barang tidak ditemukan!');
            document.location.href = 'cart.php';
        </script>
    ";
}
?>

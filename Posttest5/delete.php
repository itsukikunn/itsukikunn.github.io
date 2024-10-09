<?php
require 'koneksi.php';

$id_barang = $_GET['id_barang'];

$query = "DELETE FROM cart WHERE id_barang = '$id_barang'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "
        <script>
            alert('Berhasil menghapus barang dari keranjang!');
            document.location.href = 'cart.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus barang!');
            document.location.href = 'cart.php';
        </script>
    ";
}
?>

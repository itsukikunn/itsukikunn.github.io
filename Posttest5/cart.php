<?php
require 'koneksi.php';

$query = "SELECT * FROM cart";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Keranjang Belanja</title>
</head>
<body>
    <div class="cart-container">
        <h1>Keranjang Belanja</h1>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah Barang</th>
                        <th>Alamat Pembeli</th>
                        <th>No HP Pembeli</th>
                        <th>Edit atau Hapus Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nama_produk']; ?></td>
                            <td>Rp <?php echo number_format($row['harga']); ?></td>
                            <td><?php echo $row['jumlah_barang']; ?></td>
                            <td><?php echo $row['alamat_pembeli']; ?></td>
                            <td><?php echo $row['no_hp_pembeli']; ?></td>
                            <td>
                                <a href="edit.php?id_barang=<?php echo $row['id_barang']; ?>" class="edit-data">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="delete.php?id_barang=<?php echo $row['id_barang']; ?>" class="hapus-data" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                    <i class="fa-solid fa-square-minus"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Keranjang belanja kosong.</p>
        <?php endif; ?>
        <div class="back-button">
            <a href="user.php" class="b-button">Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>
</html>

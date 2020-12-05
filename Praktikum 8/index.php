<?php 
$conn = mysqli_connect("localhost","root","","pbw_crud");

$result = mysqli_query($conn,"SELECT * FROM item");
$items = [];
while ($row = mysqli_fetch_assoc($result)) {
    $items[] = $row;
}

?>

<!DOCTYPE html>
<head>
    <title>CRUD</title>
</head>
<body>
    <h1>ETALASE</h1>
    <p><a href="create.php">Tambah</a></p>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1 ?>
        <?php foreach ($items as $item) { ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $item['gambar']; ?>" width="50px" ></td>
            <td><?= $item['nama']; ?></td>
            <td><?= $item['harga']; ?></td>
            <td><?= $item['kategori']; ?></td>
            <td><?= $item['stok']; ?></td>
            <td>
                <a href="update.php?id=<?= $item['id']; ?>">Ubah | </a>
                <a href="delete.php?id=<?= $item['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

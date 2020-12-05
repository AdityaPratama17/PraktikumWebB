<?php 

$conn = mysqli_connect("localhost","root","","pbw_crud");
$id = $_GET["id"];

$result = mysqli_query($conn,"SELECT * FROM item WHERE id=$id");
$item = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
	$nama = $_POST["nama"];
	$harga = $_POST["harga"];
	$kategori = $_POST["kategori"];
	$stok = $_POST["stok"];
	$gambar = $_POST["gambar"];

	mysqli_query($conn,"UPDATE item SET nama='$nama',harga=$harga,kategori='$kategori',stok='$stok',gambar='$gambar' WHERE id=$id");

	if (mysqli_affected_rows($conn)>0) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CREATE</title>
</head>
<body>

<h1>Update Item</h1>

<table border = "0" cellpadding="10">
	<form action="" method="post">
		<tr>
			<th style="text-align:left;"><label for="nama">Nama </label></th>
			<td>:</td>
			<td><input type="text" name="nama" id="nama" required value="<?= $item['nama']; ?>"></td>
		</tr>
		<tr>
			<th style="text-align:left;"><label for="harga">Harga </label></th>
			<td>:</td>
			<td><input type="number" name="harga" id="harga" required value="<?= $item['harga']; ?>"></td>
		</tr>
		<tr>
			<th style="text-align:left;">Kategori</th>
			<td>:</td>
			<td>
				<select name="kategori">
					<option value="Paint">Paint</option>
					<option value="Furniture">Furniture</option>
					<option value="Handcraft">Handcraft</option>
					<option value="Souvenir">Souvenir</option>
					<option value="Statue">Statue</option>
				</select>
  			</td>
		</tr>
		<tr>
			<th style="text-align:left;"><label for="stok">Stok </label></th>
			<td>:</td>
			<td><input type="number" name="stok" id="stok" required value="<?= $item['stok']; ?>"></td>
		</tr>
		<tr>
			<th style="text-align:left;"><label for="gambar">Gambar </label></th>
			<td>:</td>
			<td><input type="file" name="gambar" id="gambar" required value="<?= $item['gambar']; ?>"></td>
		</tr>
		<tr>
			<td><button type="submit" name="submit">Submit</button></td>
		</tr>
	</form>
</table>

</body>
</html>
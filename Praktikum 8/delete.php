<?php 

$conn = mysqli_connect("localhost","root","","pbw_crud");

$id = $_GET["id"];

mysqli_query($conn,"DELETE FROM item WHERE id = $id");

if (mysqli_affected_rows($conn)>0) {
	echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'index.php';
		</script>
	";
}
?>
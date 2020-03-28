<?php include("connection.php");
include("header.php");
$kode_barang = $_GET['kode_barang'];
$hasil = mysql_query("DELETE FROM tabel_barang WHERE kode_barang='$kode_barang'", $koneksi)
?>
<script type="text/javascript">
window.location.href="barang.php";
</script>

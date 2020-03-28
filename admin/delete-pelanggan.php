<?php include("connection.php");
include("header.php");
$kode_pelanggan = $_GET['kode_pelanggan'];
$hasil = mysql_query("DELETE FROM tabel_pelanggan WHERE kode_pelanggan='$kode_pelanggan'", $koneksi)
?>
<script type="text/javascript">
window.location.href="pelanggan.php";
</script>

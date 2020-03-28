<?php include("connection.php");
include("header.php");
$kode_pemasok = $_GET['kode_pemasok'];
$hasil = mysql_query("DELETE FROM tabel_pemasok WHERE kode_pemasok='$kode_pemasok'", $koneksi);
mysql_close($koneksi);
?>
<script type="text/javascript">
window.location.href="pemasok.php";
</script>

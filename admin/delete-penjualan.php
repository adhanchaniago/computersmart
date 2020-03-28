<?php include("connection.php");
include("header.php");
$resi_penjualan = $_GET['resi_penjualan'];
$hasil = mysql_query("DELETE FROM tabel_penjualan WHERE resi_penjualan = '$resi_penjualan'", $koneksi);
?>
<script type="text/javascript">
window.location.href="penjualan.php";
</script>

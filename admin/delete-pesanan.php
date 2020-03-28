<?php include("connection.php");
include("header.php");
$id = $_GET['id'];
$hasil = mysql_query("DELETE FROM tabel_pesanan WHERE id='$id'", $koneksi)
?>
<script type="text/javascript">
window.location.href="pesanan.php";
</script>

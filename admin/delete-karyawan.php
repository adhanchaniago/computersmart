<?php include("connection.php");
include("header.php");
$kode_karyawan = $_GET['kode_karyawan'];
$hasil = mysql_query("DELETE FROM tabel_karyawan WHERE kode_karyawan = '$kode_karyawan'", $koneksi);
?>
<script type="text/javascript">
window.location.href="karyawan.php";
</script>

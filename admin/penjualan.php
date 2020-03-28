<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Penjualan</title>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<body>
<?php include("connection.php");
include("header.php");

function rupiah($angka)
{
$rupiah="";
$rp=strlen($angka);
while ($rp>3)
{
$rupiah = ".". substr($angka,-3). $rupiah;
$s=strlen($angka) - 3;
$angka=substr($angka,0,$s);
$rp=strlen($angka);
}
$rupiah = "Rp. " . $angka . $rupiah . ",-";
return $rupiah;
}
?>
<div id="container">

<div class="penjualan">
<li><a href="add-penjualan.jsp"><input type="image" src="icon/add.png" /></a></li>
<li><a href="print-penjualan.jsp" target="_blank"><input type="image" src="icon/print.png" /></a></li>
</div>

<div id="content">
<?php
$no=1;
$hasil = mysql_query("SELECT tabel_penjualan.resi_penjualan, tabel_penjualan.tanggal, tabel_barang.nama_barang, tabel_penjualan.jumlah, 
tabel_barang.harga_jual, (tabel_barang.harga_jual*tabel_penjualan.jumlah) as harga_total, tabel_pelanggan.nama_pelanggan, 
tabel_karyawan.nama_karyawan FROM tabel_penjualan INNER JOIN tabel_barang ON tabel_penjualan.kode_barang = tabel_barang.kode_barang 
INNER JOIN tabel_pelanggan ON tabel_pelanggan.kode_pelanggan = tabel_penjualan.kode_pelanggan INNER JOIN tabel_karyawan ON 
tabel_karyawan.kode_karyawan = tabel_penjualan.kode_karyawan;",$koneksi);?>

<table border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr class="judul">
<td><b>No</b></td>
<td><b>Resi Penjualan</b></td>
<td><b>Tanggal</b></td>
<td><b>Nama Barang</b></td>
<td><b>Jumlah</b></td>
<td><b>Harga</b></td>
<td><b>Harga Total</b></td>
<td><b>Nama Pelanggan</b></td>
<td><b>Nama Karyawan</b></td>
<td colspan=2><b>Action</b></td>
</tr>
<?php while ($baris = mysql_fetch_row($hasil))
{?>
<tr class="data">
<td><?php echo $no; ?></td>
<td><?php echo $baris[0]; ?></td>
<td><?php echo $baris[1]; ?></td>
<td><?php echo $baris[2]; ?></td>
<td><?php echo $baris[3]; ?></td>
<td><?php $harga = $baris['4']; $rupiah = rupiah($harga); echo $rupiah;?></td>
<td><?php $harga = $baris['5']; $rupiah = rupiah($harga); echo $rupiah;?></td>
<td><?php echo $baris[6]; ?></td>
<td><?php echo $baris[7]; ?></td>
<td><a href='edit-penjualan.php?resi_penjualan=<?php echo $baris[0];?>'><input type='image' src='icon/edit.png'/></a></td>
<td><a onclick="return confirm('Anda yakin ingin menghapus data tersebut?')" href='delete-penjualan.php?resi_penjualan=<?php echo $baris[0];?>'><input type='image' src='icon/delete.png'/></a></td>
</tr>
<?php $no++;
}?>
</table>
</div>
</div>

<?php
include('footer.php');
?>
</body>
</html>
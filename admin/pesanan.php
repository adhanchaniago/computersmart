<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Pesanan</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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

<div class="pesanan">
<li><a href="print-pesanan.jsp" target="_blank"><input type="image" src="icon/print.png" /></a></li>
</div>

<div id="content">
<?php
$no=1;
$hasil = mysql_query("SELECT tabel_pesanan.id, tabel_pesanan.tanggal, tabel_pesanan.nama, tabel_pesanan.no_hp, tabel_pesanan.email, tabel_pesanan.kota, tabel_pesanan.alamat, tabel_pesanan.kode_pos, tabel_barang.nama_barang, tabel_barang.harga_jual FROM tabel_pesanan inner join tabel_barang on tabel_pesanan.kode_barang = tabel_barang.kode_barang",$koneksi);?>

<table border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr class="judul">
<td><b>No</b></td>
<td><b>Id Pelanggan</b></td>
<td><b>Tanggal</b></td>
<td><b>Nama Pelanggan</b></td>
<td><b>No Hp</b></td>
<td><b>Email</b></td>
<td><b>Kota</b></td>
<td><b>Alamat</b></td>
<td><b>Kode Pos</b></td>
<td><b>Produk</b></td>
<td><b>Harga</b></td>
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
<td><?php echo $baris[4]; ?></td>
<td><?php echo $baris[5]; ?></td>
<td><?php echo $baris[6]; ?></td>
<td><?php echo $baris[7]; ?></td>
<td><?php echo $baris[8]; ?></td>
<td><?php $harga = $baris['9']; $rupiah = rupiah($harga); echo $rupiah;?></td>
<td><a href='edit-pesanan.php?id=<?php echo $baris[0];?>'><input type='image' src='icon/edit.png'/></a></td>
<td><a onclick="return confirm('Anda yakin ingin menghapus data tersebut?')" href='delete-pesanan.php?id=<?php echo $baris[0];?>'><input type='image' src='icon/delete.png'/></a></td>
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
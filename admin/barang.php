<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Barang</title>
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

<div class="barang">
<li><a href="add-barang.jsp"><input type="image" src="icon/add.png" /></a></li>
<li><a href="print-barang.jsp" target="_blank"><input type="image" src="icon/print.png" /></a></li>
</div>

<div id="content">
<?php
$no=1;

$hasil = mysql_query("SELECT tabel_barang.kode_barang, tabel_barang.nama_barang, tabel_barang.gambar, tabel_kategori.kategori, tabel_produsen.produsen, tabel_barang.harga_beli, tabel_barang.harga_jual, tabel_barang.stok, tabel_pemasok.pemasok FROM tabel_barang INNER JOIN tabel_kategori ON tabel_barang.kode_kategori = tabel_kategori.kode_kategori INNER JOIN tabel_produsen ON tabel_barang.kode_produsen = tabel_produsen.kode_produsen INNER JOIN tabel_pemasok ON tabel_barang.kode_pemasok = tabel_pemasok.kode_pemasok order by kode_barang asc");?>

<table border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr class="judul">
<td><b>No</b></td>
<td><b>Nama Barang</b></td>
<td><b>Gambar</b></td>
<td><b>Kategori</b></td>
<td><b>Produsen</b></td>
<td><b>Harga Beli</b></td>
<td><b>Harga Jual</b></td>
<td><b>Stok</b></td>
<td><b>Nama Pemasok</b></td>
<td colspan=2><b>Action</b></td>
</tr>
<?php while($baris = mysql_fetch_array($hasil))
{?>
<tr class="data">
<td><?php echo $no; ?></td>
<td><?php echo $baris['nama_barang']; ?></td>
<td><img src="file-foto/<?php echo $baris['gambar']; ?>" width="120px" /></td>
<td><?php echo $baris['kategori']; ?></td>
<td><?php echo $baris['produsen']; ?></td>
<td><?php $harga = $baris['harga_beli']; $rupiah = rupiah($harga); echo $rupiah;?></td>
<td><?php $harga = $baris['harga_jual']; $rupiah = rupiah($harga); echo $rupiah;?></td>
<td><?php echo $baris['stok']; ?></td>
<td><?php echo $baris['pemasok']; ?></td>
<td><a href='edit-barang.jsp?kode_barang=<?php echo $baris['kode_barang'];?>'><input type='image' src='icon/edit.png'/></a></td>
<td><a onclick="return confirm('Anda yakin ingin menghapus data tersebut?')" href='delete-barang.php?kode_barang=<?php echo $baris[0];?>'><input type='image' src='icon/delete.png'/></a></td>
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
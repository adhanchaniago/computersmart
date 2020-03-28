<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<title>
Data Pencarian
</title>
<?php
include('connection.php');
include('header.php');
?>
<html>
<head>
<title>
</title>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<div id="container">
<div id="content">

<?php

if(isset($_POST['kategori']))
{
$name= $_POST['name'];
$tbl = $_POST['kategori'];
if($_POST['kategori']=='tabel_barang')
{
$no=1;
$hasil = mysql_query("SELECT tabel_barang.nama_barang, tabel_barang.gambar, tabel_kategori.kategori, tabel_produsen.produsen, tabel_barang.harga_beli, tabel_barang.harga_jual, tabel_barang.stok, tabel_pemasok.pemasok FROM tabel_barang INNER JOIN tabel_kategori ON tabel_barang.kode_kategori = tabel_kategori.kode_kategori INNER JOIN tabel_produsen ON tabel_barang.kode_produsen = tabel_produsen.kode_produsen INNER JOIN tabel_pemasok ON tabel_barang.kode_pemasok = tabel_pemasok.kode_pemasok where nama_barang like '%$name%'");?>

<table class="isi" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
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
<?php while($baris = mysql_fetch_row($hasil))
{?>
<tr class="data">
<td><?php echo $no; ?></td>
<td><?php echo $baris[0]; ?></td>
<td><img src="file-foto/<?php echo $baris[1]; ?>" width="120px" /></td>
<td><?php echo $baris[2]; ?></td>
<td><?php echo $baris[3]; ?></td>
<td><?php echo $baris[4]; ?></td>
<td><?php echo $baris[5]; ?></td>
<td><?php echo $baris[6]; ?></td>
<td><?php echo $baris[7]; ?></td>
<td><a href='edit-barang.jsp'><input type='image' src='icon/edit.png'/></a></td>
<td><a href='delete-barang.jsp'><input type='image' src='icon/delete.png'/></a></td>
</tr>
<?php $no++;
}
echo"</table>";
}


elseif($_POST['kategori']=='tabel_penjualan')
{
$no=1;
$hasil = mysql_query("SELECT tabel_penjualan.resi_penjualan, tabel_penjualan.tanggal, tabel_barang.nama_barang, tabel_penjualan.jumlah, 
tabel_barang.harga_jual, (tabel_barang.harga_jual*tabel_penjualan.jumlah) as harga_total, tabel_pelanggan.nama_pelanggan, 
tabel_karyawan.nama_karyawan FROM tabel_penjualan INNER JOIN tabel_barang ON tabel_penjualan.kode_barang = tabel_barang.kode_barang 
INNER JOIN tabel_pelanggan ON tabel_pelanggan.kode_pelanggan = tabel_penjualan.kode_pelanggan INNER JOIN tabel_karyawan ON 
tabel_karyawan.kode_karyawan = tabel_penjualan.kode_karyawan where nama_barang like '%$name%'",$koneksi);?>

<table class="isi" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
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
<td><?php echo $baris[4]; ?></td>
<td><?php echo $baris[5]; ?></td>
<td><?php echo $baris[6]; ?></td>
<td><?php echo $baris[7]; ?></td>
<td><a href='edit-penjualan.php?resi_penjualan=<?php echo $baris[0];?>'><input type='image' src='edit.png'/></a></td>
<td><a href='delete-penjualan.php'><input type='image' src='delete.png'/></a></td>
</tr>
<?php $no++;
}
echo"</table>";
}

elseif($_POST['kategori']=='tabel_pesanan')
{
	$no=1;
$hasil = mysql_query("SELECT * FROM tabel_pesanan where nama like '%$name%'");?>

<table class="isi" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
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
<td><a href='edit-pesanan.php'><input type='image' src='edit.png'/></a></td>
<td><a href='delete-pesanan.php'><input type='image' src='delete.png'/></a></td>
</tr>
<?php $no++;
}
echo "</table>";
}


elseif($_POST['kategori']=='tabel_pelanggan')
{
	$no=1;
$hasil = mysql_query("SELECT * FROM tabel_pelanggan where nama_pelanggan like '%$name%'",$koneksi);?>
<table class="isi" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr class="judul">
<td><b>No</b></td>
<td><b>Kode Pelanggan</b></td>
<td><b>Nama</b></td>
<td><b>Alamat</b></td>
<td><b>No HP</b></td>
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
<td><a href='edit-pelanggan.php?kode_pelanggan=<?php echo $baris[0];?>'><input type='image' src='edit.png'/></a></td>
<td><a href=''><input type='image' src='delete.png'/></a></td></tr>
<?php $no++;
}
echo "</table>";	
}



elseif($_POST['kategori']=='tabel_karyawan')
{
$no=1;
$hasil = mysql_query("SELECT * FROM tabel_karyawan where nama_karyawan like '%$name%'",$koneksi);?>
<table class="isi" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr class="judul">
<td><b>No</b></td>
<td><b>Kode karyawan</b></td>
<td><b>Nama</b></td>
<td><b>Foto</b></td>
<td><b>Alamat</b></td>
<td><b>No HP</b></td>
<td colspan=2><b>Action</b></td>
</tr>
<?php while ($baris = mysql_fetch_row($hasil))
{?>
<tr class="data">
<td><?php echo $no; ?></td>
<td><?php echo $baris[0]; ?></td>
<td><?php echo $baris[1]; ?></td>
<td><img src="file-foto/<?php echo $baris[2]; ?>" width="120px" /></td>
<td><?php echo $baris[3]; ?></td>
<td><?php echo $baris[4]; ?></td>
<td><a href='edit-karyawan.php?kode_karyawan=<?php echo $baris[0];?>'><input type='image' src='edit.png'/></a></td>
<td><a href='delete-karyawan.php'><input type='image' src='delete.png'/></a></td>
</tr>
<?php $no++;
}
echo "</table>";
}
elseif($_POST['kategori']=='tabel_pemasok')
{
	$hasil = mysql_query("SELECT * FROM tabel_pemasok where pemasok like '%$name%'",$koneksi);
$no=1;?>
<table class="isi" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr class="judul">
<td><b>No</b></td>
<td><b>Kode Pemasok</b></td>
<td><b>Pemasok</b></td>
<td><b>Alamat</b></td>
<td><b>No HP</b></td>
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
<td><a href='edit-pemasok.php?kode_pemasok=<?php echo $baris[0];?>'><input type='image' src='edit.png'/></a></td>
<td><a href='delete-pemasok.php'><input type='image' src='delete.png'/></a></td>
</tr>
<?php $no++;
}
echo "</table>";
}
else
{
echo"<script>alert('Pilih kategori');</script>";	
}
}
else
{
	header('location:404.php');}

?>	
</div>
</div>
<?php
include('footer.php');
?>
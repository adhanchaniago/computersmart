<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Barang</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php include("connection.php");
include("header.php");

$hasil=mysql_query("select kode_barang from tabel_barang order by kode_barang DESC LIMIT 0,1");
	$data=mysql_fetch_array($hasil);
	$kodeawal=substr($data['kode_barang'],3,4)+1;
	if($kodeawal<10){
		$kode='PB00'.$kodeawal;
	}elseif($kodeawal > 9 && $kodeawal <=99){
		$kode='PB00'.$kodeawal;
	}else{
		$kode='PB00'.$kodeawal;
	}

?>
<div id="container">
<form action="" enctype="multipart/form-data" method="post">
<table class="tabel" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<?php
$kode_barang = $_GET['kode_barang'];
$hasil = mysql_query("select * from tabel_barang where kode_barang = '$kode_barang'") or die (mysql_error());
$baris = mysql_fetch_row($hasil);
?>
<tr>
<td><b>Kode Barang</b></td>
<td>
<input type="text" name="kode_barang" id="kode_barang" value="<?php echo $baris[0]; ?>" readonly="readonly"/>
</td>
</tr>
<tr>
<td><b>Nama Barang</b></td>
<td><input type="text" name="nama_barang" id="nama_barang" value="<?php echo $baris[1]; ?>"/></td>
</tr>
<tr>
<td><b>Gambar</b></td>
<td> <input type="file" name="gambar"/>
</td>
</tr>
<tr>
<td><b>Kode Kategori</b></td>
<td>
<select name="kode_kategori" id="kode_kategori">
<option value="">--Pilih--</option>
<?php 
$query = mysql_query("select * from tabel_kategori");
while($kodebrg = mysql_fetch_array($query))
{
echo"<option value=".$kodebrg['kode_kategori']." selected='selected'>".$kodebrg['kode_kategori']."</option>";	
}
?>
</select>
</td>
</tr>
<tr>
<td><b> Kode Produsen</b></td>
<td>
<select name="kode_produsen" id="kode_produsen">
<option value="">--Pilih--</option>
<?php 
$query = mysql_query("select * from tabel_produsen");
while($kodebrg = mysql_fetch_array($query))
{
echo"<option value=".$kodebrg['kode_produsen']." selected='selected'>".$kodebrg['kode_produsen']."</option>";	
}
?>
</select>
</td>
</tr>
<tr>
<td><b>Harga Beli</b></td>
<td><input type="text" name="harga_beli" id="harga_beli" value="<?php echo $baris[5]; ?>"/></td>
</tr>
<tr>
<td><b>Harga Jual</b></td>
<td><input type="text" name="harga_jual" id="harga_jual" value="<?php echo $baris[6]; ?>"/></td>
</tr>
<tr>
<td><b>Stok</b></td>
<td><input type="text" name="stok" id="stok" value="<?php echo $baris[7]; ?>"/></td>
</tr>
<tr>
<td><b>Kode Pemasok</b></td>
<td><select name="kode_pemasok" id="kode_pemasok">
<option value="">--Kode Pemasok--</option>
<?php 
$query = mysql_query("select * from tabel_pemasok");
while($kodebrg = mysql_fetch_array($query))
{
echo"<option value=".$kodebrg['kode_pemasok']." selected='selected'>".$kodebrg['kode_pemasok']."</option>";	
}
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="input" onClick="return validasi()" />
<input type="reset" name="reset" /></td>
</tr>
</table>
</form>
</div>

<?php
include('footer.php');
?>

</body>
</html>

<?php
if(isset($_POST['input']))    
{  
$nama_barang = $_POST["nama_barang"];

$sumber = $_FILES["gambar"]["tmp_name"];
$target = 'file-foto/';
$gambar = $_FILES['gambar']['name'];

$kode_kategori = $_POST["kode_kategori"];
$kode_produsen = $_POST["kode_produsen"];
$harga_beli = $_POST["harga_beli"];
$harga_jual = $_POST["harga_jual"];
$stok = $_POST["stok"];
$kode_pemasok = $_POST["kode_pemasok"];
$cekdata="SELECT kode_barang FROM tabel_barang WHERE nama_barang='$nama_barang' && gambar='$gambar' && kode_kategori='$kode_kategori' && kode_produsen='$kode_produsen' && harga_beli='$harga_beli' && harga_jual='$harga_jual' && stok='$stok' && kode_pemasok='$kode_pemasok'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Tidak Berubah");';
echo '</script>';
}
else
{
$kode_barang = $_POST["kode_barang"];
$nama_barang = $_POST["nama_barang"];

$sumber = $_FILES["gambar"]["tmp_name"];
$target = 'file-foto/';
$gambar = $_FILES['gambar']['name'];

$pindah = move_uploaded_file($sumber, $target.$nama_gambar);

$kode_kategori = $_POST["kode_kategori"];
$kode_produsen = $_POST["kode_produsen"];
$harga_beli = $_POST["harga_beli"];
$harga_jual = $_POST["harga_jual"];
$stok = $_POST["stok"];
$kode_pemasok = $_POST["kode_pemasok"];
$hasil = mysql_query("UPDATE tabel_barang SET nama_barang='$nama_barang', gambar='$gambar', kode_kategori='$kode_kategori', kode_produsen='$kode_produsen', harga_beli='$harga_beli', harga_jual='$harga_jual', stok='$stok', kode_pemasok='$kode_pemasok' WHERE kode_barang='$kode_barang'",$koneksi);
mysql_close($koneksi);
echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Diubah");';
echo 'window.location.href="barang.jsp";';
echo '</script>';
}}

?>
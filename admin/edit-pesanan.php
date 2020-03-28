<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Pesanan</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php include("connection.php");
include("header.php");?>

<div id="container">
<form action="" method="post">
<table class="tabel" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<?php
$id = $_GET['id'];
$hasil = mysql_query("select * from tabel_pesanan where id = '$id'") or die (mysql_error());
$baris = mysql_fetch_row($hasil);
?>
<tr>
<td><b>Kode Pesanan</b></td>
<td>
<input type="text" name="id" value="<?php echo $baris[0]; ?>" readonly="readonly"/>
</td>
</tr>
<tr>
<td><b>Tanggal</b></td>
<td><input type="text" name="tanggal" id="tanggal" value="<?php echo $baris[1]; ?>"/></td>
</tr>
<tr>
<td><b>Nama Pemesan</b></td>
<td><input type="text" name="nama" id="nama" value="<?php echo $baris[2]; ?>"/></td>
</tr>
<tr>
<td><b>No HP</b></td>
<td><input type="text" name="no_hp" id="no_hp" value="<?php echo $baris[3]; ?>"/></td>
</tr>
<tr>
<td><b>Email</b></td>
<td><input type="text" name="email" id="email" value="<?php echo $baris[4]; ?>"/></td>
</tr>
<tr>
<td><b>Kota</b></td>
<td><input type="text" name="kota" id="kota" value="<?php echo $baris[5]; ?>"/></td>
</tr>
<tr>
<td><b>Alamat</b></td>
<td><input type="text" name="alamat" id="alamat" value="<?php echo $baris[6]; ?>"/></td>
</tr>
<tr>
<td><b>Kode Pos</b></td>
<td><input type="text" name="kode_pos" id="kode_pos" value="<?php echo $baris[7]; ?>"/></td>
</tr>
<tr>
<td><b>Kode Barang</b></td>
<td><select name="kode_barang" id="kode_barang" value="<?php echo $baris[8]; ?>">
<option value="">--Kode Barang--</option>
<?php 
$query = mysql_query("select * from tabel_barang");
while($kodebrg = mysql_fetch_array($query))
{
echo"<option value=".$kodebrg['kode_barang'].">".$kodebrg['kode_barang']."</option>";	
}
?>
</select>
</td>
</tr>
<tr>
<td colspan=2 align="center">
<input name="input" type="submit" value="Update"/>
<input name="reset" type="reset" value="Reset"/>
</td>
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
$tanggal = $_POST["tanggal"];
$nama = $_POST["nama"];
$no_hp = $_POST["no_hp"];
$email = $_POST["email"];
$kota = $_POST["kota"];
$alamat = $_POST["alamat"];
$kode_pos = $_POST["kode_pos"];
$kode_barang = $_POST["kode_barang"];
$cekdata="SELECT id FROM tabel_pesanan WHERE tanggal='$tanggal' && nama='$nama' && no_hp='$no_hp' && email='$email' && kota='$kota' && alamat='$alamat' && kode_pos='$kode_pos' && kode_barang='$kode_barang'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Tidak Berubah");';
echo '</script>';
}
else
{
$id = $_POST["id"];
$tanggal = $_POST["tanggal"];
$nama = $_POST["nama"];
$no_hp = $_POST["no_hp"];
$email = $_POST["email"];
$kota = $_POST["kota"];
$alamat = $_POST["alamat"];
$kode_pos = $_POST["kode_pos"];
$kode_barang = $_POST["kode_barang"];
$hasil = mysql_query("UPDATE tabel_pesanan SET tanggal='$tanggal', nama='$nama', no_hp='$no_hp', email='$email', kota='$kota', alamat='$alamat', kode_pos='$kode_pos', kode_barang='$kode_barang' WHERE id='$id'",$koneksi);
mysql_close($koneksi);
echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Diubah");';
echo 'window.location.href="pesanan.jsp";';
echo '</script>';
}}


?>
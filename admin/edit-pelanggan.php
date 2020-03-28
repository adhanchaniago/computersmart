<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Pelanggan</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
#tabel-edit{padding-left:450px;}
</style>
</head>

<body>
<?php include("connection.php");
include("header.php");?>

<div id="container">
<div id="tabel-edit">
<form action="" method="post">
<table border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<?php
$kode_pelanggan = $_GET['kode_pelanggan'];
$hasil = mysql_query("select * from tabel_pelanggan where kode_pelanggan = '$kode_pelanggan'") or die (mysql_error());
$baris = mysql_fetch_row($hasil);
?>
<tr>
<tr>
<td><b>Kode</b></td>
<td><input name="kode_pelanggan" type="text" value="<?php echo $baris[0]; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td><b>Nama Pelanggan</b></td>
<td><input name="nama_pelanggan" type="text" value="<?php echo $baris[1]; ?>"/></td>
</tr>
<tr>
<td><b>Alamat</b></td>
<td><input name="alamat" type="text" value="<?php echo $baris[2]; ?>"/>
</td>
</tr>
<tr>
<td><b>No HP</b></td>
<td><input name="no_hp" type="text" value="<?php echo $baris[3]; ?>"/></td>
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
</div>
<?php
include('footer.php');
?>

</body>
</html>

<?php
if(isset($_POST['input']))    
{  
$nama_pelanggan = $_POST["nama_pelanggan"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];
$cekdata="SELECT kode_pelanggan FROM tabel_pelanggan WHERE nama_pelanggan='$nama_pelanggan' && alamat='$alamat' && no_hp='$no_hp'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Tidak Berubah");';
echo '</script>';
}
else
{
$kode_pelanggan = $_POST["kode_pelanggan"];
$nama_pelanggan = $_POST["nama_pelanggan"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];
$hasil = mysql_query("UPDATE tabel_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', no_hp='$no_hp' WHERE kode_pelanggan='$kode_pelanggan'",$koneksi);
mysql_close($koneksi);
echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Diubah");';
echo 'window.location.href="pelanggan.jsp";';
echo '</script>';
}}


?>




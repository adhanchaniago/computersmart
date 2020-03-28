<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Pemasok</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php include("connection.php");
include("header.php");?>

<div id="container">

<form action="" method="post">
<table class="tabel" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>

<?php
$kode_pemasok = $_GET['kode_pemasok'];
$hasil = mysql_query("select * from tabel_pemasok where kode_pemasok = '$kode_pemasok'") or die (mysql_error());
$baris = mysql_fetch_row($hasil);
?>

<tr>
<td><b>Kode</b></td>
<td><input name="kode_pemasok" type="text" value="<?php echo $baris[0]; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td><b>Pemasok</b></td>
<td><input name="pemasok" type="text" value="<?php echo $baris[1]; ?>"/></td>
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

<?php
include('footer.php');
?>
</body>
</html>

<?php
if(isset($_POST['input']))    
{  
$pemasok = $_POST["pemasok"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];
$cekdata="SELECT kode_pemasok FROM tabel_pemasok WHERE pemasok='$pemasok' && alamat='$alamat' && no_hp='$no_hp'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Tidak Berubah");';
echo '</script>';
}
else
{
$kode_pemasok = $_POST["kode_pemasok"];
$pemasok = $_POST["pemasok"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];
$hasil = mysql_query("UPDATE tabel_pemasok SET pemasok='$pemasok', alamat='$alamat', no_hp='$no_hp' WHERE kode_pemasok='$kode_pemasok'",$koneksi);
mysql_close($koneksi);
echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Diubah");';
echo 'window.location.href="pemasok.jsp";';
echo '</script>';
}}


?>

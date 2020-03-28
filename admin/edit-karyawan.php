<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Karyawan</title>
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
<form action="" enctype="multipart/form-data" method="post">
<table border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<?php
$kode_karyawan = $_GET['kode_karyawan'];
$hasil = mysql_query("select * from tabel_karyawan where kode_karyawan = '$kode_karyawan'") or die (mysql_error());
$baris = mysql_fetch_row($hasil);
?>
<tr>
<td><b>Kode</b></td>
<td><input name="kode_karyawan" type="text" value="<?php echo $baris[0]; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td><b>Nama</b></td>
<td><input name="nama_karyawan" type="text" value="<?php echo $baris[1]; ?>"/></td>
</tr>
<tr>
<td><b>Gambar</b></td>
<td>
<img src="file-foto/<?php echo $baris[2]; ?>" width="120px" name="ada"/>
<br />
<input type="file" name="gambar" id="gambar" value="<?php echo $baris[2]; ?>"/>
</td>
</tr>
<tr>
<td><b>Alamat</b></td>
<td><textarea name="alamat" cols="21" rows="" ><?php echo $baris[3]; ?></textarea></td>
</tr>
<tr>
<td><b>No HP</b></td>
<td><input name="no_hp" type="text" value="<?php echo $baris[4]; ?>"/></td>
</tr>
<tr>
<td colspan=2 align="center">
<input name="input" type="submit" />
<input name="reset" type="reset" />
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
$nama_karyawan = $_POST["nama_karyawan"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];

$sumber = $_FILES["gambar"]["tmp_name"];
$target = 'file-foto/';
$nama_gambar = $_FILES['gambar']['name'];

$cekdata="SELECT kode_karyawan FROM tabel_karyawan WHERE nama_karyawan='$nama_karyawan' &&  gambar='$nama_gambar' && alamat='$alamat' && no_hp='$no_hp'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Tidak Berubah");';
echo '</script>';
}
else
{

$kode_karyawan = $_POST["kode_karyawan"];
$nama_karyawan = $_POST["nama_karyawan"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];

$sumber = $_FILES["gambar"]["tmp_name"];
$target = 'file-foto/';
$nama_gambar = $_FILES['gambar']['name'];

$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
$hasil = mysql_query("UPDATE tabel_karyawan SET nama_karyawan='$nama_karyawan', gambar='$nama_gambar', alamat='$alamat', no_hp='$no_hp' WHERE kode_karyawan='$kode_karyawan'",$koneksi);
mysql_close($koneksi);

echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Diubah");';
echo 'window.location.href="karyawan.jsp";';
echo '</script>';
}
}

?>
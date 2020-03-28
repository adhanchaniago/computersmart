<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Data Pelanggan</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script>
    function validasi(){
       var str, error;
	   str = "";
	   error = 0;
	   if(document.getElementById("nama_pelanggan").value.length<=0){
	   str += "- Nama Pelanggan tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("alamat").value.length<=0){
	   str += "- Alamat tidak boleh kosong.\n";
	   error++;
	   }
	    if(document.getElementById("no_hp").value.length<=0){
	   str += "- No HP tidak boleh kosong.\n";
	   error++;
	   }
	   if (error>0){
	   alert("Terdapat kesalahan : \n"+ str);
	   return false;
	   }
	   else{
	   return true;}
    }
</script>
</head>

<body>
<?php include("connection.php");
include("header.php");

$hasil=mysql_query("select count(kode_pelanggan) as total FROM tabel_pelanggan");
	$data=mysql_fetch_array($hasil);
	$kodeawal= $data['total'];
	if(strlen($kodeawal)<2)
	{
	$kodepelanggan = "PL00".($kodeawal+1);
	}
	elseif(strlen($kodeawal)<3)
	{
	$kodepelanggan = "PL0".($kodeawal+1);
	}
	else
	{
		$kodepelanggan = "PL".($kodeawal+1);
	}


?>
<div id="container">
<form action="" method="post">
<table class="tabel" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr>
<td><b>Kode Pelanggan</b></td>
<td><input type="text" name="kode_pelanggan" id="kode_pelanggan" value="<?php echo $kodepelanggan;?>" readonly="readonly"/></td>
</tr>
<tr>
<td><b>Nama Pelanggan</b></td>
<td><input type="text" name="nama_pelanggan" id="nama_pelanggan"/></td>
</tr>
<tr>
<td><b>Alamat</b></td>
<td><input type="text" name="alamat" id="alamat"/></td>
</tr>
<tr>
<td><b>No HP</b></td>
<td><input type="text" name="no_hp" id="no_hp"/></td>
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
$kode_pelanggan = $_POST["kode_pelanggan"];
$cekdata="SELECT kode_pelanggan FROM tabel_pelanggan WHERE kode_pelanggan='$kode_pelanggan'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Duplikat");';
echo '</script>';
}
else
{
$kode_pelanggan = $_POST["kode_pelanggan"];
$nama_pelanggan = $_POST["nama_pelanggan"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];
$hasil = mysql_query("INSERT INTO tabel_pelanggan VALUES ('$kode_pelanggan','$nama_pelanggan','$alamat', '$no_hp')",$koneksi);
mysql_close($koneksi);

echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Ditambah");';
echo 'window.location.href="pelanggan.jsp";';
echo '</script>';
}}

?>

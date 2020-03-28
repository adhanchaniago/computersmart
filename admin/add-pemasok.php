<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Data Pemasok</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script>
    function validasi(){
       var str, error;
	   str = "";
	   error = 0;
	   if(document.getElementById("pemasok").value.length<=0){
	   str += "- Nama Pemasok tidak boleh kosong.\n";
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
$title = 'Tambah Data Pemasok';
include("header.php");

$hasil=mysql_query("select count(kode_pemasok) as total FROM tabel_pemasok");
	$data=mysql_fetch_array($hasil);
	$kodeawal= $data['total'];
	if(strlen($kodeawal)<2)
	{
	$kodepemasok = "PM00".($kodeawal+1);
	}
	elseif(strlen($kodeawal)<3)
	{
	$kodepemasok = "PM0".($kodeawal+1);
	}
	else
	{
		$kodepemasok= "PM".($kodeawal+1);
	}

?>
<div id="container">
<form action="" method="post">
<table class="tabel" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr>
<td><b>Kode Pemasok</b></td>
<td><input type="text" name="kode_pemasok" id="kode_pemasok" value="<?php echo $kodepemasok;?>" readonly="readonly"/></td>
</tr>
<tr>
<td><b>Pemasok</b></td>
<td><input type="text" name="pemasok" id="pemasok"/></td>
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

$pemasok = $_POST["pemasok"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];
$cekdata="SELECT kode_pemasok FROM tabel_pemasok WHERE pemasok='$pemasok' && alamat='$alamat' && no_hp='$no_hp'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Duplikat");';
echo '</script>';
}
else
{
$kode_pemasok = $_POST["kode_pemasok"];
$pemasok = $_POST["pemasok"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];
$hasil = mysql_query("INSERT INTO tabel_pemasok VALUES ('$kode_pemasok','$pemasok','$alamat', '$no_hp')",$koneksi);
mysql_close($koneksi);

echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Ditambah");';
echo 'window.location.href="pemasok.jsp";';
echo '</script>';
}}


?>

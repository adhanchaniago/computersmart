<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Data Penjualan</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script>
    function validasi(){
       var str, error;
	   str = "";
	   error = 0;
	   if(document.getElementById("tanggal").value.length<=0){
	   str += "- Tanggal tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("jumlah").value.length<=0){
	   str += "- Jumlah tidak boleh kosong.\n";
	   error++;
	   }
	    if(document.getElementById("kode_barang").value.length<=0){
	   str += "- Kode barang tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("kode_pelanggan").value.length<=0){
	   str += "- Kode Pelanggan tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("kode_karyawan").value.length<=0){
	   str += "- Kode Karyawan tidak boleh kosong.\n";
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

$hasil=mysql_query("select count(resi_penjualan) as total FROM tabel_penjualan");
	$data=mysql_fetch_array($hasil);
	$kodeawal= $data['total'];
	if(strlen($kodeawal)<2)
	{
	$resipenjualan = "PJ00".($kodeawal+1);
	}
	elseif(strlen($kodeawal)<3)
	{
	$resipenjualan = "PJ0".($kodeawal+1);
	}
	else
	{
		$resipenjualan = "PJ".($kodeawal+1);
	}

?>
<div id="container">
<form action="" method="post">
<table class="tabel" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr>
<td><b>Resi Penjualan</b></td>
<td><input type="text" name="resi_penjualan" id="resi_penjualan" value="<?php echo $resipenjualan;?>" readonly="readonly"/></td>
</tr>
<tr>
<td><b>Tanggal</b></td>
<td><input type="text" name="tanggal" id="tanggal"/></td>
</tr>
<tr>
<td><b>Jumlah</b></td>
<td><input type="text" name="jumlah" id="jumlah"/></td>
</tr>
<tr>
<td><b>Kode Barang</b></td>
<td>
<select name="kode_barang" id="kode_barang">
<option value="" selected="selected">--Pilih--</option>
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
<td><b>Kode Pelanggan</b></td>
<td><select name="kode_pelanggan" id="kode_pelanggan">
<option value="" selected="selected">--Pilih--</option>
<?php 
$query = mysql_query("select * from tabel_pelanggan");
while($kodepelanggan = mysql_fetch_array($query))
{
echo"<option value=".$kodepelanggan['kode_pelanggan'].">".$kodepelanggan['kode_pelanggan']."</option>";	
}
?>
</select>
</td>
</tr>
<tr>
<td><b>Kode Karyawan</b></td>
<td><select name="kode_karyawan" id="kode_karyawan">
<option value="" selected="selected">--Pilih--</option>
<?php 
$query = mysql_query("select * from tabel_karyawan");
while($kodekaryawan = mysql_fetch_array($query))
{
echo"<option value=".$kodekaryawan['kode_karyawan'].">".$kodekaryawan['kode_karyawan']."</option>";	
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
$resi_penjualan = $_POST["resi_penjualan"];
$cekdata="SELECT resi_penjualan FROM tabel_penjualan WHERE resi_penjualan='$resi_penjualan'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Duplikat");';
echo '</script>';
}
else
{
$resi_penjualan = $_POST["resi_penjualan"];
$tanggal = $_POST["tanggal"];
$jumlah = $_POST["jumlah"];
$kode_barang = $_POST["kode_barang"];
$kode_pelanggan = $_POST["kode_pelanggan"];
$kode_karyawan = $_POST["kode_karyawan"];
$hasil = mysql_query("INSERT INTO tabel_penjualan VALUES ('$resi_penjualan','$tanggal','$jumlah', '$kode_barang', '$kode_pelanggan', '$kode_karyawan')",$koneksi);
mysql_close($koneksi);
echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Ditambah");';
echo 'window.location.href="penjualan.jsp";';
echo '</script>';
}}

?>
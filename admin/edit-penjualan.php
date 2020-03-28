<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Penjualan</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script>
    function validasi(){
       var str, error;
	   str = "";
	   error = 0;
	   if(document.getElementById("kode_pelanggan").value.length<=0){
	   str += "- Kode pelanggan tidak boleh kosong.\n";
	   error++;
	   }
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

$hasil=mysql_query("select resi_penjualan from tabel_penjualan order by resi_penjualan DESC LIMIT 0,1");
	$data=mysql_fetch_array($hasil);
	$kodeawal=substr($data['resi_penjualan'],3,4)+1;
	if($kodeawal<10){
		$kode='PJ00'.$kodeawal;
	}elseif($kodeawal > 9 && $kodeawal <=99){
		$kode='PJ00'.$kodeawal;
	}else{
		$kode='PJ00'.$kodeawal;
	}

?>

<div id="container">
<form action="" method="post">
<table class="tabel" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<?php
$resi_penjualan = $_GET['resi_penjualan'];
$hasil = mysql_query("select * from tabel_penjualan where resi_penjualan = '$resi_penjualan'") or die (mysql_error());
$baris = mysql_fetch_row($hasil);
?>
<tr>
<td><b>Resi Penjualan</b></td>
<td><input type="text" name="resi_penjualan" id="resi_penjualan" value="<?php echo $baris[0]; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td><b>Tanggal</b></td>
<td><input type="text" name="tanggal" id="tanggal" value="<?php echo $baris[1]; ?>"/></td>
</tr>
<tr>
<td><b>Jumlah</b></td>
<td><input type="text" name="jumlah" id="jumlah" value="<?php echo $baris[2]; ?>"/></td>
</tr>
<tr>
<td><b>Kode Barang</b></td>
<td>
<select name="kode_barang" id="kode_barang">
<option value="">--Pilih--</option>
<?php 
$query = mysql_query("select * from tabel_barang");
while($kodebrg = mysql_fetch_array($query))
{
echo"<option value=".$kodebrg['kode_barang']." selected='selected'>".$kodebrg['kode_barang']."</option>";	
}
?>
</select>
</td>
</tr>
<tr>
<td><b>Kode Pelanggan</b></td>
<td><select name="kode_pelanggan" id="kode_pelanggan">
<option value="">--Pilih--</option>
<?php 
$query = mysql_query("select * from tabel_pelanggan");
while($kodebrg = mysql_fetch_array($query))
{
echo"<option value=".$kodebrg['kode_pelanggan']." selected='selected'>".$kodebrg['kode_pelanggan']."</option>";	
}
?>
</select>
</td>
</tr>
<tr>
<td><b>Kode Karyawan</b></td>
<td>
<select name="kode_karyawan" id="kode_karyawan">
<option value="">--Pilih--</option>
<?php 
$query = mysql_query("select * from tabel_karyawan");
while($kodebrg = mysql_fetch_array($query))
{
echo"<option value=".$kodebrg['kode_karyawan']." selected='selected'>".$kodebrg['kode_karyawan']."</option>";	
}
?>
</select>
</td>
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
$tanggal = $_POST["tanggal"];
$jumlah = $_POST["jumlah"];
$kode_barang = $_POST["kode_barang"];
$kode_pelanggan = $_POST["kode_pelanggan"];
$kode_karyawan = $_POST["kode_karyawan"];
$cekdata="SELECT resi_penjualan FROM tabel_penjualan WHERE tanggal='$tanggal' && jumlah='$jumlah' && kode_barang='$kode_barang' && kode_pelanggan='$kode_pelanggan' && kode_karyawan='$kode_karyawan'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Tidak Berubah");';
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
$hasil = mysql_query("UPDATE tabel_penjualan SET tanggal='$tanggal', jumlah='$jumlah', kode_barang='$kode_barang', kode_pelanggan='$kode_pelanggan', kode_karyawan='$kode_karyawan' WHERE resi_penjualan='$resi_penjualan'",$koneksi);
mysql_close($koneksi);
echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Diubah");';
echo 'window.location.href="penjualan.jsp";';
echo '</script>';
}}

?>
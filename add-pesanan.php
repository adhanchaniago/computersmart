
<?php
$hasil=mysql_query("select count(id) as total FROM tabel_pesanan");
	$data=mysql_fetch_array($hasil);
	$kodeawal= $data['total'];
	if(strlen($kodeawal)<2)
	{
	$id = "PS00".($kodeawal+1);
	}
	elseif(strlen($kodeawal)<3)
	{
	$id = "PS0".($kodeawal+1);
	}
	else
	{
		$id = "PS".($kodeawal+1);
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="admin/icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Data Pesanan</title>
<link rel="stylesheet" type="text/css" href="admin/style.css"/>
<script>
    function validasi(){
       var str, error;
	   str = "";
	   error = 0;
	   if(document.getElementById("tanggal").value.length<=0){
	   str += "- Tanggal tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("nama").value.length<=0){
	   str += "- Nama tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("no_hp").value.length<=0){
	   str += "- No hp tidak boleh kosong.\n";
	   error++;
	   }
	    if(document.getElementById("email").value.length<=0){
	   str += "- Email tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("kota").value.length<=0){
	   str += "- Kota tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("alamat").value.length<=0){
	   str += "- Alamat tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("kode_pos").value.length<=0){
	   str += "- Kode pos tidak boleh kosong.\n";
	   error++;
	   }
	    if(document.getElementById("kode_barang").value.length<=0){
	   str += "- Kode barang tidak boleh kosong.\n";
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
<?php include("admin\connection.php");
include("header.php");?>
<div id="container">
<form action="" method="post">
<table class="tabel" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr>
<td><b>Kode Pesanan</b></td>
<td>
<input type="text" name="id" value="<?php echo $id;?>" readonly="readonly"/>
</td>
</tr>
<tr>
<td><b>Tanggal</b></td>
<td><input type="text" name="tanggal" id="tanggal"/></td>
</tr>
<tr>
<td><b>Nama Pemesan</b></td>
<td><input type="text" name="nama" id="nama"/></td>
</tr>
<tr>
<td><b>No HP</b></td>
<td><input type="text" name="no_hp" id="no_hp"/></td>
</tr>
<tr>
<td><b>Email</b></td>
<td><input type="text" name="email" id="email"/></td>
</tr>
<tr>
<td><b>Kota</b></td>
<td><input type="text" name="kota" id="kota"/></td>
</tr>
<tr>
<td><b>Alamat</b></td>
<td><input type="text" name="alamat" id="alamat"/></td>
</tr>
<tr>
<td><b>Kode Pos</b></td>
<td><input type="text" name="kode_pos" id="kode_pos"/></td>
</tr>
<tr>
<td><b>Kode Barang</b></td>
<td><select name="kode_barang" id="kode_barang">
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
$id = $_POST["id"];
$cekdata="SELECT id FROM tabel_pesanan WHERE id='$id'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Duplikat");';
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
$hasil = mysql_query("INSERT INTO tabel_pesanan VALUES ('$id','$tanggal','$nama', '$no_hp', '$email','$kota','$alamat', '$kode_pos', '$kode_barang')",$koneksi);
include ('pesanan.php');
mysql_close($koneksi);
echo '<script type="text/javascript">';
echo 'alert("Pesanan Berhasil Dikirim");';
echo 'window.location.href="index.jsp";';
echo '</script>';
}}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Data Barang</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script>
    function validasi(){
       var str, error;
	   str = "";
	   error = 0;
	   if(document.getElementById("nama_barang").value.length<=0){
	   str += "- Nama barang tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("gambar").value.length<=0){
	   str += "- Gambar tidak boleh kosong.\n";
	   error++;
	   }
	    if(document.getElementById("kategori").value.length<=0){
	   str += "- Kategori tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("produsen").value.length<=0){
	   str += "- Produsen Pelanggan tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("harga_beli").value.length<=0){
	   str += "- Harga Beli tidak boleh kosong.\n";
	   error++;
	   }
	    if(document.getElementById("harga_jual").value.length<=0){
	   str += "- Harga Jual tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("stok").value.length<=0){
	   str += "- Stok tidak boleh kosong.\n";
	   error++;
	   }
	    if(document.getElementById("kode_pemasok").value.length<=0){
	   str += "- Kode pemasok tidak boleh kosong.\n";
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

$hasil=mysql_query("select count(kode_barang) as total FROM tabel_barang");
	$data=mysql_fetch_array($hasil);
	$kodeawal= $data['total'];
	if(strlen($kodeawal)<2)
	{
	$kodebarang = "PB00".($kodeawal+1);
	}
	elseif(strlen($kodeawal)<3)
	{
	$kodebarang = "PB0".($kodeawal+1);
	}
	else
	{
		$kodebarang = "PB".($kodeawal+1);
	}
	

?>

<div id="container">
<form action="" enctype="multipart/form-data" method="post">
<table class="tabel" border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr>
<td><b>Kode Barang</b></td>
<td>
<input type="text" name="kode_barang" id="kode_barang" value="<?php echo $kodebarang;?>" readonly="readonly"/>
</td>
</tr>
<tr>
<td><b>Nama Barang</b></td>
<td><input type="text" name="nama_barang" id="nama_barang"/></td>
</tr>
<tr>
<td><b>Gambar</b></td>
<td> <input type="file" name="gambar" id="gambar" />
</td>
</tr>
<tr>
<td><b>Kategori</b></td>
<td><select name="kategori" id="kategori">
<option value="" selected="selected">--Pilih--</option>
<option value="AK123">Aksesoris</option>
<option value="HF123">Harddisk & Flashdisk</option>
<option value="KO123">Komputer</option>
<option value="LA123">Laptop</option>
<option value="MO123">Monitor</option>
<option value="PR123">Printer</option>
<option value="TA123">Tablet</option>
</select></td>
</tr>
<tr>
<td><b>Produsen</b></td>
<td><select name="produsen" id="produsen">
<option value="" selected="selected">--Pilih--</option>
<option value="AC123">Acer</option>
<option value="AP123">Apple</option>
<option value="AS123">Asus</option>
<option value="DE123">Dell</option>
<option value="SO123">Sony</option>
<option value="TO123">Toshiba</option>
</select>
</td>
</tr>
<tr>
<td><b>Harga Beli</b></td>
<td><input type="text" name="harga_beli" id="harga_beli"/></td>
</tr>
<tr>
<td><b>Harga Jual</b></td>
<td><input type="text" name="harga_jual" id="harga_jual"/></td>
</tr>
<tr>
<td><b>Stok</b></td>
<td><input type="text" name="stok" id="stok"/></td>
</tr>
<tr>
<td><b>Kode Pemasok</b></td>
<td><select name="kode_pemasok" id="kode_pemasok">
<option value="" selected="selected">--Pilih--</option>
<?php 
$query = mysql_query("select * from tabel_pemasok");
while($kodebrg = mysql_fetch_array($query))
{
echo"<option value=".$kodebrg['kode_pemasok'].">".$kodebrg['kode_pemasok']."</option>";	
}
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="center"><button type="submit" name="input" onClick="return validasi()" />
<button type="reset" name="reset" /></td>
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
$kode_barang = $_POST["kode_barang"];
$cekdata="SELECT kode_barang FROM tabel_barang WHERE kode_barang='$kode_barang'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Duplikat");';
echo '</script>';
}
else
{
$kode_barang = $_POST["kode_barang"];
$nama_barang = $_POST["nama_barang"];
$kategori = $_POST["kategori"];
$produsen = $_POST["produsen"];
$harga_beli = $_POST["harga_beli"];
$harga_jual = $_POST["harga_jual"];
$stok = $_POST["stok"];
$kode_pemasok = $_POST["kode_pemasok"];

$sumber = $_FILES["gambar"]["tmp_name"];
$target = 'file-foto/';
$nama_gambar = $_FILES['gambar']['name'];

$pindah = move_uploaded_file($sumber, $target.$nama_gambar);

$hasil = mysql_query("INSERT INTO tabel_barang VALUES ('$kode_barang','$nama_barang', '$nama_gambar', '$kategori', '$produsen', '$harga_beli','$harga_jual','$stok', '$kode_pemasok')",$koneksi);
mysql_close($koneksi);
echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Ditambah");';
echo 'window.location.href="barang.jsp";';
echo '</script>';
}}

?>
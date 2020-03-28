<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Data Karyawan</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script>
    function validasi(){
       var str, error;
	   str = "";
	   error = 0;
	   if(document.getElementById("nama_karyawan").value.length<=0){
	   str += "- Nama karyawan tidak boleh kosong.\n";
	   error++;
	   }
	   if(document.getElementById("gambar").value.length<=0){
	   str += "- Gambar tidak boleh kosong.\n";
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

$hasil=mysql_query("select count(kode_karyawan) as total FROM tabel_karyawan");
	$data=mysql_fetch_array($hasil);
	$kodeawal= $data['total'];
    if(strlen($kodeawal)<3)
	{
	$kodekaryawan = "KSC0".($kodeawal+1);
	}
	else
	{
		$kodekaryawan= "KSC".($kodeawal+1);
	}

?>

<div id="container">
<form action="" enctype="multipart/form-data" method="post">
<input type= "hidden" name="MAX_FILE_SIZE" value="100000000">
<table border=1 class="tabel" align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr>
<td width="112"><b>Kode Karyawan</b></td>
<td width="200"><input type="text" name="kode_karyawan" value="<?php echo $kodekaryawan;?>" readonly="readonly"/></td>
</tr>
<tr>
<td><b>Nama Karyawan</b></td>
<td><input type="text" name="nama_karyawan" id="nama_karyawan"/></td>
</tr>
<tr>
<td><b>Foto</b></td>
<td> <input type="file" name="gambar" id="gambar"/>
</td>
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

$nama_karyawan = $_POST["nama_karyawan"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];
$cekdata="SELECT kode_karyawan FROM tabel_karyawan WHERE nama_karyawan='$nama_karyawan' && no_hp='$no_hp'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
{ 
echo '<script type="text/javascript">';
echo 'alert("Data Duplikat");';
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
$hasil = mysql_query("INSERT INTO tabel_karyawan VALUES ('$kode_karyawan','$nama_karyawan', '$nama_gambar','$alamat','$no_hp')",$koneksi);

echo '<script type="text/javascript">';
echo 'alert("Data Berhasil Ditambah");';
echo 'window.location.href="karyawan.jsp";';
echo '</script>';
}}

?>



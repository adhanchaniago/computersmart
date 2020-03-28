<html>
<head>
<link rel="stylesheet" type="text/css" href="admin/style.css"/>
<style type="text/css">


</style>
</head>

<?php
function rupiah($angka)
{
$rupiah="";
$rp=strlen($angka);
while ($rp>3)
{
$rupiah = ".". substr($angka,-3). $rupiah;
$s=strlen($angka) - 3;
$angka=substr($angka,0,$s);
$rp=strlen($angka);
}
$rupiah = "Rp. " . $angka . $rupiah . ",-";
return $rupiah;
}
?>

<div id="beranda">

<div id="aksesoris">

<?php
include('admin/connection.php');
include('header.php');
if(isset($_POST['kategori']))
{
$name= $_POST['name'];
$tbl = $_POST['kategori'];

switch($tbl)
{
	case'AK123':
	$nk = 'aks';
	break;
	case'HF123':
	$nk = 'HF';
	break;
	case'KO123':
	$nk = 'KO';
	break;
	case'LA123':
	$nk = 'LA';
	break;
	default:
	$nk = 'semua';
	break;
}
echo "<h3>$nk</h3>";
if(!empty($name)){
$hasil = mysql_query("SELECT tabel_barang.nama_barang, tabel_barang.gambar, tabel_barang.harga_jual,tabel_barang.kode_kategori FROM tabel_barang INNER JOIN tabel_kategori ON tabel_barang.kode_kategori = tabel_kategori.kode_kategori where tabel_barang.nama_barang like '%$name%' and tabel_barang.kode_kategori  like '$tbl'");}

else{  
$hasil = mysql_query("SELECT tabel_barang.nama_barang, tabel_barang.gambar, tabel_barang.harga_jual,tabel_barang.kode_kategori FROM tabel_barang INNER JOIN tabel_kategori ON tabel_barang.kode_kategori = tabel_kategori.kode_kategori where tabel_barang.nama_barang like '%$name%'");

}
 while($baris = mysql_fetch_array($hasil))
{?>
<div id="daftar-produk">
<h4 class='nama-produk'><?php echo $baris['nama_barang']; ?></h4>
<img src="admin/file-foto/<?php echo $baris['gambar']; ?>" class='gambar'/>
<h5 class='harga'><?php $harga = $baris['harga_jual']; $rupiah = rupiah($harga); echo $rupiah;?>
</h5>
<div id="tombol">
<a href="http://localhost/php/computersmart.com/admin" class="info"><button class='info'>Detail</button></a>&nbsp;<a href="http://localhost/php/computersmart.com/add-pesanan.jsp" class="beli"><button class='beli'>Beli</button> </a>
</div>
</div>
<?php
}


}
else
{
	header('location:404.php');
}

?>	
</div>
</div>

<div id="menukanan">
<?php include('sidebar.php');
?>
</div>
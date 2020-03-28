
<link rel="stylesheet" type="text/css" href="admin/style.css"/>


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


<div id="aksesoris">


<?php 
echo "<h3>AKSESORIS</h3>";
$hasil = mysql_query("select * from tabel_barang where kode_kategori='AK123'");
while ($baris = mysql_fetch_array($hasil))
{?>

<div id="daftar-produk">
<h4 class='nama-produk'><?php echo $baris['nama_barang']; ?></h4>
<img src="admin/file-foto/<?php echo $baris['gambar']; ?>" class='gambar'/>
<h5 class='harga'><?php $harga = $baris['harga_jual']; $rupiah = rupiah($harga); echo $rupiah;?>
</h5>

<a href="http://localhost/php/computersmart.com/admin" class="info"><button class='info'>Detail</button></a>&nbsp;<a href="http://localhost/php/computersmart.com/add-pesanan.jsp" class="beli"><button class='beli'>Beli</button> </a>
</div>


<?php
}
?>

<?php 
echo "<h3>HARDDISK & FLASHDISK</h3>";
$hasil = mysql_query("select * from tabel_barang where kode_kategori='HF123'");
while ($baris = mysql_fetch_array($hasil))
{?>

<div id="daftar-produk">
<h4 class='nama-produk'><?php echo $baris['nama_barang']; ?></h4>
<img src="admin/file-foto/<?php echo $baris['gambar']; ?>" class='gambar'/>
<h5 class='harga'><?php $harga = $baris['harga_jual']; $rupiah = rupiah($harga); echo $rupiah;?></h5>
<button class='info'>Detail</button>&nbsp;
<a href="http://localhost/php/computersmart.com/add-pesanan.jsp" class="beli"><button class='beli'>Beli</button> </a>
</div>

<?php
}
?>

<?php 
echo "<h3>KOMPUTER</h3>";
$hasil = mysql_query("select * from tabel_barang where kode_kategori='KO123'");
while ($baris = mysql_fetch_array($hasil))
{?>

<div id="daftar-produk">
<h4 class='nama-produk'><?php echo $baris['nama_barang']; ?></h4>
<img src="admin/file-foto/<?php echo $baris['gambar']; ?>" class='gambar'/>
<h5 class='harga'><?php $harga = $baris['harga_jual']; $rupiah = rupiah($harga); echo $rupiah;?></h5>
<button class='info'>Detail</button>&nbsp;
<a href="http://localhost/php/computersmart.com/add-pesanan.jsp" class="beli"><button class='beli'>Beli</button> </a>
</div>

<?php
}
?>

<?php 
echo "<h3>LAPTOP</h3>";
$hasil = mysql_query("select * from tabel_barang where kode_kategori='LA123'");
while ($baris = mysql_fetch_array($hasil))
{?>

<div id="daftar-produk">
<h4 class='nama-produk'><?php echo $baris['nama_barang']; ?></h4>
<img src="admin/file-foto/<?php echo $baris['gambar']; ?>" class='gambar'/>
<h5 class='harga'><?php $harga = $baris['harga_jual']; $rupiah = rupiah($harga); echo $rupiah;?></h5>
<button class='info'>Detail</button>&nbsp;
<a href="http://localhost/php/computersmart.com/add-pesanan.jsp" class="beli"><button class='beli'>Beli</button> </a>
</div>

<?php
}
?>

<?php 
echo "<h3>MONITOR</h3>";
$hasil = mysql_query("select * from tabel_barang where kode_kategori='MO123'");
while ($baris = mysql_fetch_array($hasil))
{?>

<div id="daftar-produk">
<h4 class='nama-produk'><?php echo $baris['nama_barang']; ?></h4>
<img src="admin/file-foto/<?php echo $baris['gambar']; ?>" class='gambar'/>
<h5 class='harga'><?php $harga = $baris['harga_jual']; $rupiah = rupiah($harga); echo $rupiah;?></h5>
<button class='info'>Detail</button>&nbsp;
<a href="http://localhost/php/computersmart.com/add-pesanan.jsp" class="beli"><button class='beli'>Beli</button> </a>
</div>

<?php
}
?>

<?php 
echo "<h3>PRINTER</h3>";
$hasil = mysql_query("select * from tabel_barang where kode_kategori='PR123'");
while ($baris = mysql_fetch_array($hasil))
{?>

<div id="daftar-produk">
<h4 class='nama-produk'><?php echo $baris['nama_barang']; ?></h4>
<img src="admin/file-foto/<?php echo $baris['gambar']; ?>" class='gambar'/>
<h5 class='harga'><?php $harga = $baris['harga_jual']; $rupiah = rupiah($harga); echo $rupiah;?></h5>
<button class='info'>Detail</button>&nbsp;
<a href="http://localhost/php/computersmart.com/add-pesanan.jsp" class="beli"><button class='beli'>Beli</button> </a>
</div>

<?php
}
?>

<?php 
echo "<h3>TABLET</h3>";
$hasil = mysql_query("select * from tabel_barang where kode_kategori='TA123'");
while ($baris = mysql_fetch_array($hasil))
{?>

<div id="daftar-produk">
<h4 class='nama-produk'><?php echo $baris['nama_barang']; ?></h4>
<img src="admin/file-foto/<?php echo $baris['gambar']; ?>" class='gambar'/>
<h5 class='harga'><?php $harga = $baris['harga_jual']; $rupiah = rupiah($harga); echo $rupiah;?></h5>
<button class='info'>Detail</button>&nbsp;
<a href="http://localhost/php/computersmart.com/add-pesanan.jsp" class="beli"><button class='beli'>Beli</button> </a>
</div>

<?php
}
?>

</div>
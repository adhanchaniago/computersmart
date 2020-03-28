<?php
ini_set("display_errors",false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>
<style type="text/css">
#now a{border-bottom:inset 20px #FF0}
}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<body>
<div id='Header'>
<ul>
<li><a href='pemasok.jsp'>Pemasok</a></li>
<li><a href='karyawan.jsp'>Karyawan</a></li>
<li><a href='pelanggan.jsp'>Pelanggan</a></li>
<li><a href='pesanan.jsp'>Pesanan</a></li>
<li id="now"><a href='penjualan.jsp' >Penjualan</a></li>
<li><a href='barang.jsp'>Barang</a></li>
<li>
<form action="pencarian.jsp" method="post">
<table>
<tr align="center">
<td id="home">
 <img src="icon/home.png"/>
  </td>
<td>
    <input class="search" value="<?php echo $_POST['name'];?>" type="text" placeholder="Cari" name="name"/>   
    </td>
    
    <td>
    <select name="kategori" class="option">
    <option value=''>Pilih Kategori</option>
    <option value="tabel_barang">Barang</option>
    <option value="tabel_penjualan">Penjualan</option>
    <option value="tabel_pesanan">Pesanan</option>
    <option value="tabel_pelanggan">Pelanggan</option>
    <option value="tabel_karyawan">Karyawan</option>
    <option value="tabel_pemasok">Pemasok</option>
    </select>
    </td>
    
    <td>
  <input name='cari' class="button" type="image" src="icon/cari.png" />
  </td>
  
	</tr>
    </table>
    
  </form>
</li>
</ul>
</div>

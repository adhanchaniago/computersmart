<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Pemasok</title>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<body>
<?php include("connection.php");
include("header.php");?>
<div id="container">

<div class="pemasok">
<li><a href="add-pemasok.jsp"><input type="image" src="icon/add.png" /></a></li>
<li><a href="print-pemasok.jsp" target="_blank"><input type="image" src="icon/print.png" /></a></li>
</div>

<div id="content">
<?php
$hasil = mysql_query("SELECT * FROM tabel_pemasok",$koneksi);
$no=1;?>
<table border=1 align=center  bordercolor=#00CCFF cellpadding=5 cellspacing=0>
<tr class="judul">
<td><b>No</b></td>
<td><b>Kode Pemasok</b></td>
<td><b>Pemasok</b></td>
<td><b>Alamat</b></td>
<td><b>No HP</b></td>
<td colspan=2><b>Action</b></td>
</tr>
<?php while ($baris = mysql_fetch_row($hasil))
{?>
<tr class="data">
<td><?php echo $no; ?></td>
<td><?php echo $baris[0]; ?></td>
<td><?php echo $baris[1]; ?></td>
<td><?php echo $baris[2]; ?></td>
<td><?php echo $baris[3]; ?></td>
<td><a href='edit-pemasok.php?kode_pemasok=<?php echo $baris[0];?>'><input type='image' src='icon/edit.png'/></a></td>
<td><a onclick="return confirm('Anda yakin ingin menghapus data tersebut?')" href='delete-pemasok.php?kode_pemasok=<?php echo $baris[0];?>'><input type='image' src='icon/delete.png'/></a></td>
</tr>
<?php $no++;
}?>
</table>
</div>
</div>

<?php
include('footer.php');
?>
</body>
</html>
<?php
$koneksi = mysql_connect ("localhost","root","") or die ("Koneksi Ke Server Gagal");
mysql_select_db("database_penjualan",$koneksi) or die ("Koneksi Ke Database Gagal");
?>
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
.logo{padding-right:5px;}
}
</style>
<link rel="stylesheet" type="text/css" href="admin/style.css"/>

</head>

<body>
<div id='Header'>
<ul>
<li><a href='tentang.jsp'>Tablet</a></li>
<li><a href='cara-belanja.jsp'>Monitor</a></li>
<li><a href='add-pesanan.jsp'>Laptop</a></li>
<li><a href='tentang.jsp'>Komputer</a></li>
<li><a href='cara-belanja.jsp'>Harddisk & Flashdisk</a></li>
<li><a href='add-pesanan.jsp'>Aksesoris</a></li>
<li>
<form action="pencarian.jsp" method="post">
<table>
<tr align="center">

    

<td>
    <input class="search" value="<?php echo $_POST['name'];?>" type="text" placeholder="Cari" name="name"/>   
    </td>
    
      <td>
    <select name="kategori" class="option">
    <option value=''>Pilih Kategori</option>
    <option value="AK123">Aksesoris</option>
    <option value="HF123">Harddisk & Flashdisk</option>
    <option value="KO123">Komputer</option>
    <option value="LA123">Laptop</option>
    <option value="MO123">Monitor</option>
    <option value="PR123">Printer</option>
    <option value="TA123">Tablet</option>
    </select>
    </td>
    
    <td>
  <input name='cari' class="button" type="image" src="admin/icon/cari.png" />
  </td>
  	</tr>
    
    </table>
  </form>
</li>
</ul>
</div>

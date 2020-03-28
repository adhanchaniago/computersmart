<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="shortcut icon" href="admin/icon/logo.ico" type="image/x-icon">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<style type="text/css">
#footer{
	bottom:0;
    height:30px;
    line-height:30px;
    background:#333;
    color:#fff;
	width:100%;
	}
	
	
#utama{ margin-top:100px; width:1200px; margin-left:50px; margin-right:50px; }

</style>

<link rel="stylesheet" href="admin/style.css">
<link rel="stylesheet" href="slider/css/slide.css">

</head>

<body>
<div class="container">

   <div class="slide">
        <ul class="slide-container">
            <li>
                <a href=""><img src="slider/img/1.png" alt=""></a>
            </li>
            <li>
                <a href=""><img src="slider/img/2.png" alt=""></a>
            </li>
            <li>
                <a href="javascript:;"><img src="slider/img/1.png" alt=""></a>
            </li>
            <li>
                <a href="javascript:;"><img src="slider/img/2.png" alt=""></a>
            </li>
        </ul>
    </div>
</div>
<script src="jquery.js"></script>
    <script type="text/javascript" class="library" src="slider/slide.js"></script>
<script>
    $('.slide').slide({
        start:true,
        speed:2000,
        animate: 'horizontal'
    })
    </script>
    
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php 
include("admin\connection.php");
include("header.php");
 ?>



<div id="utama">
<?php include("produk.php");?>
</div>

<?php 
include('footer.php');
?>

</body>
</html>
<?php
session_start();
include('connection.php');
?>

<html>
<head>
<title>Data Base Penggajian Pegawai</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>

</head>
<body OnLoad="document.login.username.focus();">

  <div id="login">
<h2>Login</h2>
        <?php
		if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $pass = md5($_POST['password']);
$q = mysql_query("select * from users where username='$user' AND password='$pass'");
if(mysql_num_rows($q)>0)
{$data = mysql_fetch_array($q);
	if($data['level']=='admin')
	{	$_SESSION['admin'] = $data['username'];
	header('location:./home.php');
		}
	else
	{	$_SESSION['user'] = $data['username'];
	header('location:./home.php');
		}
	}
	else
	{echo"<b>Username dan Sandi Salah</b>";}}
	else{
		?>
       
	
<?php
	}
?>
<form name="login" action="" method="POST" onSubmit="return validasi(this)">  
  <table>
<tr><td>Username</td><td> : <input type="text" name="username"></td></tr>
<tr><td>Password</td><td> : <input type="password" name="password"></td></tr>
<tr><td colspan="2"><input name='submit' type="submit" value="Login"></td></tr>
</table>
</form>

  </div>

</body>
</html>
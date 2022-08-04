<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Login</title></head>
<body>
<?php banner();?>
<h1><center>Login</center></h1>
<?php
if(isset($_GET["error"])){
		$error=$_GET["error"];
		if($error==1)
			showError("Username dan password tidak sesuai.");
		else if($error==2)
			showError("Error database. Silahkan hubungi administrator");
		else if($error==3)
			showError("Koneksi ke Database gagal. Autentikasi gagal.");
		else if($error==4)
			showError("Anda tidak boleh mengakses halaman sebelumnya karena belum login. Silahkan login terlebih dahulu.");
		else
			showError("Unknown Error.");
}
?>
<form method="post" name="f" action="login.php">
<center><table border="1">
<tr><th colspan="2">Login Username</th></tr>
<tr><td>Username</td>
	<td><input type="text" name="username" maxlength="11" size="12"></td></tr>
<tr><td>Password</td>
	<td><input type="password" name="password" maxlength="16" size="12"></td></tr>
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblLogin" value="Login"></td>
</tr>
</form>
</table>
</body>
</html>

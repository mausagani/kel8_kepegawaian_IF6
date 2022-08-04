<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Hapus Data Pegawai</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Hapus Data Pegawai</h1>
<?php
if(isset($_GET["nik_pegawai"])){
	$db=dbConnect();
	$nik_pegawai=$db->escape_string($_GET["nik_pegawai"]);
	if($datapegawai=getDataPegawai($nik_pegawai)){// cari data produk, kalau ada simpan di $data
		?>
<a href="pegawai.php"><button>View Pegawai</button></a>
<form method="post" name="frm" action="pegawai-hapus.php">
<input type="hidden" name="nik_pegawai" value="<?php echo $datapegawai["nik_pegawai"];?>">
<table border="1">
<tr><td>NIK Pegawai</td><td><?php echo $datapegawai["nik_pegawai"];?></td></tr>
<tr><td>Nama</td><td><?php echo $datapegawai["nama"];?></td></tr>
<tr><td>Usia</td><td><?php echo $datapegawai["usia"];?></td></tr>
<tr><td>Jenis Kelamin</td><td><?php echo $datapegawai["jk"];?></td></tr>
<tr><td>Alamat</td><td><?php echo $datapegawai["alamat"];?></td></tr>
<tr><td>No Telepon</td><td><?php echo $datapegawai["no_telpon"];?></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="TblHapus" value="Hapus"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Nik dengan kode : $nik_pegawai tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "NIK Pegawai tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>
<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Hapus Data Pendidikan</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Hapus Data Pendidikan Pegawai</h1>
<?php
if(isset($_GET["no"])){
	$db=dbConnect();
	$no=$db->escape_string($_GET["no"]);
	if($datapendidikan=getDataPendidikan($no)){// cari data produk, kalau ada simpan di $data
		?>
<a href="pendidikan.php"><button>View Pendidikan</button></a>
<form method="post" name="frm" action="pendidikan-hapus.php">
<input type="hidden" name="no" value="<?php echo $datapendidikan["no"];?>">
<table border="1">
<tr><td>NO</td><td><?php echo $datapendidikan["no"];?></td></tr>
<tr><td>NIK Pegawai</td><td><?php echo $datapendidikan["nik_pegawai"];?></td></tr>
<tr><td>Perguruan</td><td><?php echo $datapendidikan["perguruan"];?></td></tr>
<tr><td>SMA/SMK</td><td><?php echo $datapendidikan["sma"];?></td></tr>
<tr><td>SMP</td><td><?php echo $datapendidikan["smp"];?></td></tr>
<tr><td>SD</td><td><?php echo $datapendidikan["sd"];?></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="TblHapus" value="Hapus"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "No dengan kode : $No tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "No tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>
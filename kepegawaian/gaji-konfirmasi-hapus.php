<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Hapus Data Gaji</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Hapus Data Gaji Pegawai</h1>
<?php
if(isset($_GET["no"])){
	$db=dbConnect();
	$no=$db->escape_string($_GET["no"]);
	if($datagaji=getDataGaji($no)){// cari data produk, kalau ada simpan di $data
		?>
<a href="gaji.php"><button>View Gaji</button></a>
<form method="post" name="frm" action="gaji-hapus.php">
<input type="hidden" name="no" value="<?php echo $datagaji["no"];?>">
<table border="1">
<tr><td>NO</td><td><?php echo $datagaji["no"];?></td></tr>
<tr><td>NIK Pegawai</td><td><?php echo $datagaji["nik_pegawai"];?></td></tr>
<tr><td>Gaji Pokok</td><td><?php echo $datagaji["gaji_pokok"];?></td></tr>
<tr><td>Upah Lembur</td><td><?php echo $datagaji["upah_lembur"];?></td></tr>
<tr><td>Tunjangan</td><td><?php echo $datagaji["tunjangan"];?></td></tr>
<tr><td>Pajak</td><td><?php echo $datagaji["pajak"];?></td></tr>
<tr><td>Total Gaji</td><td><?php echo $datagaji["pajak"];?></td></tr>
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
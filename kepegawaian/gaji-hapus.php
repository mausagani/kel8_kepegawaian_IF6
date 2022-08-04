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
if(isset($_POST["TblHapus"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		$no  =$db->escape_string($_POST["no"]);
		// Susun query delete
		$sql="DELETE FROM gaji WHERE no='$no'";
		// Eksekusi query delete
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0) // jika ada data terhapus
				echo "Data berhasil dihapus.<br>";
			else // Jika sql sukses tapi tidak ada data yang dihapus
				echo "Penghapusan gagal karena data yang dihapus tidak ada.<br>";
		}
		else{ // gagal query
			echo "Data gagal dihapus. <br>";
		}
		?>
		<a href="gaji.php"><button>View Gaji</button></a>
		<?php
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>
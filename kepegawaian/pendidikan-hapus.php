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
if(isset($_POST["TblHapus"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		$no  =$db->escape_string($_POST["no"]);
		// Susun query delete
		$sql="DELETE FROM pendidikan WHERE no='$no'";
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
		<a href="pendidikan.php"><button>View Pendidikan</button></a>
		<?php
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>
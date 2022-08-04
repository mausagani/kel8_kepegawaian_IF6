<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Pembaruan Data Pendidikan</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Pembaruan Data Pendidikan Pegawai</h1>
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
        $no         =$db->escape_string($_POST["no"]);
		$nik_pegawai=$db->escape_string($_POST["nik_pegawai"]);
		$perguruan	=$db->escape_string($_POST["perguruan"]);
		$sma	   	=$db->escape_string($_POST["sma"]);
		$smp	   	=$db->escape_string($_POST["smp"]);
		$sd     	=$db->escape_string($_POST["sd"]);

		// Susun query update
		$sql="UPDATE pendidikan SET 
			  nik_pegawai='$nik_pegawai',perguruan='$perguruan',
			  sma='$sma',smp='$smp',
			  sd='$sd' WHERE no='$no'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data
				?>
				Data berhasil diupdate.<br>
				<a href="pendidikan.php"><button>View Pendidikan</button></a>
				<?php
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				?>
				Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
				<a href="javascript:history.back()"><button>Edit Kembali</button></a>
				<a href="pendidikan.php"><button>View Pendidikan</button></a>
				<?php
			}
		}
		else{ // gagal query
			?>
			Data gagal diupdate.
			<a href="javascript:history.back()"><button>Edit Kembali</button></a>
			<?php
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>
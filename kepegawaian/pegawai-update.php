<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Pembaruan Data Pegawai</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Pembaruan Data Pegawai</h1>
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$nik_pegawai    =$db->escape_string($_POST["nik_pegawai"]);
		$nama   	    =$db->escape_string($_POST["nama"]);
		$usia	   	    =$db->escape_string($_POST["usia"]);
		$jk 	   	    =$db->escape_string($_POST["jk"]);
		$alamat     	=$db->escape_string($_POST["alamat"]);
		$no_telpon     	=$db->escape_string($_POST["no_telpon"]);

		// Susun query update
		$sql="UPDATE pegawai SET 
			  nama='$nama', usia='$usia',
              jk='$jk', alamat='$alamat',
			  no_telpon='$no_telpon' 
              WHERE nik_pegawai='$nik_pegawai'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data
				?>
				Data berhasil diupdate.<br>
				<a href="pegawai.php"><button>View Pegawai</button></a>
				<?php
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				?>
				Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
				<a href="javascript:history.back()"><button>Edit Kembali</button></a>
				<a href="pegawai.php"><button>View Pegawai</button></a>
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
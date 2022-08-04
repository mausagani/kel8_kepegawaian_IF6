<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Pembaruan Data Gaji</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Pembaruan Data Gaji Pegawai</h1>
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
        $no                 =$db->escape_string($_POST["no"]);
		$nik_pegawai        =$db->escape_string($_POST["nik_pegawai"]);
		$gaji_pokok	        =$db->escape_string($_POST["gaji_pokok"]);
		$upah_lembur	   	=$db->escape_string($_POST["upah_lembur"]);
		$tunjangan	   	    =$db->escape_string($_POST["tunjangan"]);
		$pajak           	=$db->escape_string($_POST["pajak"]);
		$total_gaji         =$db->escape_string($_POST["total_gaji"]);

		// Susun query update
		$sql="UPDATE gaji SET 
			  nik_pegawai='$nik_pegawai',gaji_pokok='$gaji_pokok',
			  upah_lembur='$upah_lembur',tunjangan='$tunjangan',
			  pajak='$pajak',total_gaji='$total_gaji'
              WHERE no='$no'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data
				?>
				Data berhasil diupdate.<br>
				<a href="gaji.php"><button>View Gaji</button></a>
				<?php
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				?>
				Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
				<a href="javascript:history.back()"><button>Edit Kembali</button></a>
				<a href="gaji.php"><button>View Gaji</button></a>
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
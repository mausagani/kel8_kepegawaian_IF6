<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Penyimpanan Data Gaji Pegawai</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Penyimpanan Data Gaji Pegawai</h1>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data

        $nik_pegawai        =$db->escape_string($_POST["nik_pegawai"]);
		$gaji_pokok	        =$db->escape_string($_POST["gaji_pokok"]);
		$upah_lembur	   	=$db->escape_string($_POST["upah_lembur"]);
		$tunjangan	   	    =$db->escape_string($_POST["tunjangan"]);
		$pajak           	=$db->escape_string($_POST["pajak"]);
		$total_gaji         =$db->escape_string($_POST["total_gaji"]);
		// Susun query insert
		$sql="INSERT INTO gaji(no,nik_pegawai,gaji_pokok,upah_lembur,tunjangan,pajak,total_gaji)
			  VALUES(null,'$nik_pegawai','$gaji_pokok','$upah_lembur','$tunjangan','$pajak','$total_gaji')";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
				Data berhasil disimpan.<br>
				<a href="gaji.php"><button>View Gaji</button></a>
				<?php
			}
		}
		else{
			?>
			Data gagal disimpan karena no mungkin sudah ada.<br>
			<a href="javascript:history.back()"><button>Kembali</button></a>
			<?php
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>
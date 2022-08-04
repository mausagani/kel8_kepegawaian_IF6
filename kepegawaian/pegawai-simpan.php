<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Penyimpanan Data Pegawai</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Penyimpanan Data Pegawai</h1>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$nik_pegawai		=$db->escape_string($_POST["nik_pegawai"]);
		$nama				=$db->escape_string($_POST["nama"]);
		$usia				=$db->escape_string($_POST["usia"]);
		$jk				   	=$db->escape_string($_POST["jk"]);
		$alamat	   			=$db->escape_string($_POST["alamat"]);
		$no_telpon		 	=$db->escape_string($_POST["no_telpon"]);
		// Susun query insert
		$sql="INSERT INTO pegawai(nik_pegawai,nama,usia,jk,alamat,no_telpon)
			  VALUES('$nik_pegawai','$nama','$usia','$jk','$alamat','$no_telpon')";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
				Data berhasil disimpan.<br>
				<a href="pegawai.php"><button>View Pegawai</button></a>
				<?php
			}
		}
		else{
			?>
			Data gagal disimpan karena nik_pegawai mungkin sudah ada.<br>
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
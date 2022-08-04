<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Penyimpanan Data Pendidikan Pegawai</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Penyimpanan Data Pendidikan Pegawai</h1>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data

		$nik_pegawai=$db->escape_string($_POST["nik_pegawai"]);
		$perguruan	=$db->escape_string($_POST["perguruan"]);
		$sma	   	=$db->escape_string($_POST["sma"]);
		$smp	   	=$db->escape_string($_POST["smp"]);
		$sd     	=$db->escape_string($_POST["sd"]);
		// Susun query insert
		$sql="INSERT INTO pendidikan(no,nik_pegawai,perguruan,sma,smp,sd)
			  VALUES(null,'$nik_pegawai','$perguruan','$sma','$smp','$sd')";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
				Data berhasil disimpan.<br>
				<a href="pendidikan.php"><button>View Pendidikan</button></a>
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
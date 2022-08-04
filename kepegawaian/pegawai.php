<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>View Data Pegawai</title></head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Data Pegawai</h1>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT * 
    FROM pegawai";
	$res=$db->query($sql);
	if($res){
		?>
		<a href="pegawai-tambah.php"><button>Tambah</button></a>
		<table border="1">
		<tr><th>NIK Pegawai</th><th>Nama</th><th>Usia</th>
		    <th>Jk</th><th>Alamat</th><th>No.Telpon</th><th>Aksi</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["nik_pegawai"];?></td>
			<td><?php echo $barisdata["nama"];?></td>
			<td><?php echo $barisdata["usia"];?></td>
			<td><?php echo $barisdata["jk"];?></td>
			<td><?php echo $barisdata["alamat"];?></td>
			<td><?php echo $barisdata["no_telpon"];?></td>
			<td><a href="pegawai-form-edit.php?nik_pegawai=<?php 
echo $barisdata["nik_pegawai"];


?>"><button>Edit</button></a> <a href="pegawai-konfirmasi-hapus.php?nik_pegawai=<?php echo $barisdata["nik_pegawai"];?>"><button>Hapus</button></a></td>
			</tr>
			<?php
		}
		?>
		</table>
		<?php
		$res->free();
	}else
		echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
}
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
</body>
</html>
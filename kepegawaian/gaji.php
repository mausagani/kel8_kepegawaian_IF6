<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>View Data Gaji Pegawai</title></head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Data Gaji Pegawai</h1>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT * 
    FROM gaji";
	$res=$db->query($sql);
	if($res){
		?>
		<a href="gaji-tambah.php"><button>Tambah</button></a>
		<table border="1">
		<tr><th>No</th><th>NIK Pegawai</th><th>Gaji Pokok</th>
		    <th>Upah Lembur</th><th>Tunjangan</th><th>Pajak</th><th>Total Gaji</th>
            <th>Aksi</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["no"];?></td>
			<td><?php echo $barisdata["nik_pegawai"];?></td>
			<td><?php echo $barisdata["gaji_pokok"];?></td>
			<td><?php echo $barisdata["upah_lembur"];?></td>
			<td><?php echo $barisdata["tunjangan"];?></td>
			<td><?php echo $barisdata["pajak"];?></td>
			<td><?php echo $barisdata["total_gaji"];?></td>
			<td><a href="gaji-form-edit.php?no=<?php 
echo $barisdata["no"];


?>"><button>Edit</button></a> <a href="gaji-konfirmasi-hapus.php?no=<?php echo $barisdata["no"];?>"><button>Hapus</button></a></td>
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
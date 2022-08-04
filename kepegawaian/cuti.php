<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<head><title>View Data Cuti Pegawai</title></head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Data Cuti Pegawai</h1>
<table border="1">
    <tr>
        <td>NIK</td>
        <td>Tanggal Cuti</td>
        <td>Jumlah Cuti</td>
        <td colspan="2">Action</td>
    </tr>
<?php
$db=dbConnect();
if($db->connect_errno==0){
    $sql = "SELECT * FROM cuti";
    $res=$db->query($sql);
    if($res){
        $data=$res->fetch_all(MYSQLI_ASSOC);
        foreach($data as $baris){
        ?>
        <tr>
            <td><?php echo $baris["nik_pegawai"]; ?></td>
            <td><?php echo $baris["tanggal_cuti"]; ?></td>
            <td><?php echo $baris["jumlah_cuti"]; ?></td>
            <td><a href="cuti-form-edit.php?nik_pegawai=<?php echo $baris["nik_pegawai"]; ?>">Edit</a></td>
            <td><a href="cuti-konfirmasi-hapus.php?nik_pegawai=<?php echo $baris["nik_pegawai"]; ?>">Hapus</a></td>
        </tr>
        <?php
        }
    }else {
    echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
    }
}else {
    echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</table>
<br>
<a href="cuti-tambah.php"><button>Tambah</button></a>
</body>
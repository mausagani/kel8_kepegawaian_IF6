<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<head>
    <title>Hapus Data Jabatan</title>
</head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Hapus Data Jabatan Pegawai</h1>
<?php
if(isset($_GET["nik_pegawai"])){
    $db=dbConnect();
	$nik=$db->escape_string($_GET["nik_pegawai"]);
    if($jabatan=getDataJabatan($nik)){
    ?>
    <a href="jabatan.php"><button>View Jabatan</button></a>
    <br>
    <form method="post" name="frm" action="jabatan-hapus.php">
    <input type="hidden" name="no" value="<?php echo $jabatan["no"];?>">
    <table border="1">
        <tr>
            <td>No</td>
            <td><?php echo $jabatan["no"];?></td>
        </tr>
        <tr>
            <td>NIK Pegawai</td>
            <td><?php echo $jabatan["nik_pegawai"];?></td>
        </tr>
        <tr>
            <td>Jenis Jabatan</td>
            <td><?php echo $jabatan["jenis_jabatan"];?></td>
        </tr>
        <tr>
            <td>Masa</td>
            <td><?php echo $jabatan["masa"];?></td>
        </tr>
    </table>
    <br>
    <input type="submit" name="tblhapus" value="Hapus">
    </form>
    <?php
    }else{
        echo "No dengan kode : $No tidak ada. Penghapusan dibatalkan";
    }
    
}
?>
</body>
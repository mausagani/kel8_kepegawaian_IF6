<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<head>
    <title>Hapus Data Cuti</title>
</head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Hapus Data Cuti Pegawai</h1>
<?php
if(isset($_GET["nik_pegawai"])){
    $db=dbConnect();
	$nik=$db->escape_string($_GET["nik_pegawai"]);
    if($cuti=getDataCuti($nik)){
    ?>
    <a href="cuti.php"><button>View Cuti</button></a>
    <br>
    <form method="post" name="frm" action="cuti-hapus.php">
    <input type="hidden" name="no" value="<?php echo $cuti["no"];?>">
    <table border="1">
        <tr>
            <td>No</td>
            <td><?php echo $cuti["no"];?></td>
        </tr>
        <tr>
            <td>NIK Pegawai</td>
            <td><?php echo $cuti["nik_pegawai"];?></td>
        </tr>
        <tr>
            <td>Tanggal Cuti</td>
            <td><?php echo $cuti["tanggal_cuti"];?></td>
        </tr>
        <tr>
            <td>Jumlah Cuti</td>
            <td><?php echo $cuti["jumlah_cuti"];?></td>
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
<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<head>
    <title>Update Data Cuti</title>
</head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Update Data Cuti Pegawai</h1>
<?php
if(isset($_POST["tblupdate"])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $no=$db->escape_string($_POST["no"]);
        $nik=$db->escape_string($_POST["nik"]);
        $tgl=$db->escape_string($_POST["tgl"]);
        $jumlah=$db->escape_string($_POST["jumlah"]);

        $sql="UPDATE cuti SET 
        nik_pegawai='$nik',tanggal_cuti='$tgl',
        jumlah_cuti='$jumlah' WHERE no='$no'";

        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
                ?>
				Data berhasil diupdate.<br>
				<a href="cuti.php"><button>View cuti</button></a>
				<?php
            }else{
                ?>
				Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
				<a href="javascript:history.back()"><button>Edit Kembali</button></a>
				<a href="cuti.php"><button>View Cuti</button></a>
				<?php
            }
        }
        else{
            ?>
			Data gagal diupdate.
			<a href="javascript:history.back()"><button>Edit Kembali</button></a>
			<?php
        }
    }else{
        echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
    }
}
?>
</body>
<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<head>
    <title>Update Data Jabatan</title>
</head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Update Data Jabatan Pegawai</h1>
<?php
if(isset($_POST["tblupdate"])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $no               =$db->escape_string($_POST["no"]);
        $nik              =$db->escape_string($_POST["nik"]);
        $jenis_jabatan    =$db->escape_string($_POST["jenis_jabatan"]);
        $masa             =$db->escape_string($_POST["masa"]);

        $sql="UPDATE jabatan SET 
        nik_pegawai='$nik',jenis_jabatan='$jenis_jabatan',
        masa='$masa' WHERE no='$no'";

        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
                ?>
				Data berhasil diupdate.<br>
				<a href="jabatan.php"><button>View Jabatan</button></a>
				<?php
            }else{
                ?>
				Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
				<a href="javascript:history.back()"><button>Edit Kembali</button></a>
				<a href="jabatan.php"><button>View Jabatan</button></a>
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
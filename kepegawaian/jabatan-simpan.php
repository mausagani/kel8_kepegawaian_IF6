<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<head>
    <title>Penyimpanan Data Jabatan Pegawai</title>
</head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Penyimpanan Data Jabatan Pegawai</h1>
<?php
if(isset($_POST["tblsimpan"])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $nik_pegawai    =$db->escape_string($_POST["nik_pegawai"]);
        $jenis_jabatan  =$db->escape_string($_POST["jenis_jabatan"]);
        $masa           =$db->escape_string($_POST["masa"]);
        
        $sql="INSERT INTO jabatan VALUES (null, '$nik_pegawai', '$jenis_jabatan', '$masa')";
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
            ?>
				Data berhasil disimpan.<br>
				<a href="jabatan.php"><button>View Jabatan</button></a>
				<?php
            }else{
                ?>
                Data gagal disimpan karena no mungkin sudah ada.<br>
                <a href="javascript:history.back()"><button>Kembali</button></a>
                <?php
            }
        }
    }else{
        echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
    }

}
?>
</body>
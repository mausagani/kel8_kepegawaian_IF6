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
if(isset($_POST["tblhapus"])){
    $db=dbConnect();
    if($db->connect_errno==0){
        $no=$db->escape_string($_POST["no"]);
        $sql="DELETE FROM jabatan WHERE no='$no'";
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
                echo "Data berhasil dihapus.<br>";
            }else{
                echo "Penghapusan gagal karena data yang dihapus tidak ada.<br>";
            }
        }else{
            echo "Data gagal dihapus. <br>";
        }
        ?>
		<a href="jabatan.php"><button>View Jabatan</button></a>
		<?php
    }else{
        echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
    }
}
?>
</body>
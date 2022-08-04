<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Change</title>
</head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Log Perubahan</h1>
<table border="1">
    <tr>
        <td>Perubahan</td>
        <td>Pada Table</td>
        <td>Waktu</td>
        <td>Nik Diubah</td>
    </tr>
    <?php
    $db=dbConnect();
    if($db->connect_errno==0){
        $sql = "CALL getLog()";
        $res=$db->query($sql);
        if($res){
            $data=$res->fetch_all(MYSQLI_ASSOC);
            foreach($data as $baris){
            ?>
            <tr>
                <td><?php echo $baris["change"]; ?></td>
                <td><?php echo $baris["on_table"]; ?></td>
                <td><?php echo $baris["waktu"]; ?></td>
                <td><?php echo $baris["nik_pegawai"]; ?></td>
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

</body>
</html>
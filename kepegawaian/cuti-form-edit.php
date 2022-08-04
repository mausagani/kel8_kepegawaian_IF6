<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<head><title>Edit Data Pendidikan</title>
<script type="text/javascript" language="javascript">
function validasiCuti() {
	if(document.frm.nik.selectedIndex==0){
		alert("NIK Pegawai wajib dipilih.");
		document.frm.nik.focus();
		return false;
	}
	var tgl=document.frm.tgl.value.trim();
	if(tgl.length==0){
		alert("Tanggal tidak boleh kosong.");
		document.frm.tgl.focus();
		return false;
	}
	var jumlah=document.frm.jumlah.value.trim();
	if(jumlah.length==0){
		alert("jumlah cuti tidak boleh kosong.");
		document.frm.jumlah.focus();
		return false;
	}
return true;
}
</script>
</head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Edit Data Cuti Pegawai</h1>
<?php
if(isset($_GET["nik_pegawai"])){
    $db=dbConnect();
    $nik=$db->escape_string($_GET["nik_pegawai"]);
    if($cuti=getDataCuti($nik)){
        ?> 
        <form method="POST" name="frm" action="cuti-update.php" onsubmit="return validasiCuti()">
        <table border="1">
            <tr>
                <td>No</td>
                <td><input type="text" name="no" value="<?php echo $cuti["no"];?>" readonly></td>
            </tr>
            <tr>
                <td>NIK Pegawai</td>
                <td><select name="nik" id="nik" value="<?php echo $option["nik_pegawai"] ?>" >
                <option>Pilih Pegawai</option>
                <?php foreach(getListPegawai() as $option){
                    if($option["nik_pegawai"]!=$cuti["nik_pegawai"]){
                    ?><option value="<?php echo $option["nik_pegawai"] ?>"><?php echo $option["nik_pegawai"] ?></option><?php
                    }else{
                ?><option value="<?php echo $option["nik_pegawai"] ?>" selected><?php echo $option["nik_pegawai"] ?></option><?php }
                } ?>
                </select></td>
            </tr>
            <tr>
                <td>Tanggal Cuti</td>
                <td><input type="date" name="tgl" value="<?php echo $cuti["tanggal_cuti"];?>"></td>
            </tr>
            <tr>
                <td>jumlah Cuti</td>
                <td><input type="text" name="jumlah" value="<?php echo $cuti["jumlah_cuti"];?>"></td>
            </tr>
        <?php
    }
}
?>
        </table>
        <br>
<input type="submit" name="tblupdate" value="Update">
</form>
</body>
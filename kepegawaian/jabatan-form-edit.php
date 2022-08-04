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
	var jenis_jabatan=document.frm.jenis_jabatan.value.trim();
	if(jenis_jabatan.length==0){
		alert("Jenis Jabatan tidak boleh kosong.");
		document.frm.jenis_jabatan.focus();
		return false;
	}
	var masa=document.frm.masa.value.trim();
	if(masa.length==0){
		alert("Masa Jabatan tidak boleh kosong.");
		document.frm.masa.focus();
		return false;
	}
return true;
}
</script>
</head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Edit Data Jabatan Pegawai</h1>
<?php
if(isset($_GET["nik_pegawai"])){
    $db=dbConnect();
    $nik=$db->escape_string($_GET["nik_pegawai"]);
    if($jabatan=getDataJabatan($nik)){
        ?> 
        <form method="POST" name="frm" action="jabatan-update.php" onsubmit="return validasiJabatan()">
        <table border="1">
            <tr>
                <td>No</td>
                <td><input type="text" name="no" value="<?php echo $jabatan["no"];?>" readonly></td>
            </tr>
            <tr>
                <td>NIK Pegawai</td>
                <td><select name="nik" id="nik" value="<?php echo $option["nik_pegawai"] ?>" >
                <option>Pilih Pegawai</option>
                <?php foreach(getListPegawai() as $option){
                    if($option["nik_pegawai"]!=$jabatan["nik_pegawai"]){
                    ?><option value="<?php echo $option["nik_pegawai"] ?>"><?php echo $option["nik_pegawai"] ?></option><?php
                    }else{
                ?><option value="<?php echo $option["nik_pegawai"] ?>" selected><?php echo $option["nik_pegawai"] ?></option><?php }
                } ?>
                </select></td>
            </tr>
            <tr>
                <td>Jenis Jabatan</td>
                <td><input type="text" name="jenis_jabatan" value="<?php echo $jabatan["jenis_jabatan"];?>"></td>
            </tr>
            <tr>
                <td>masa</td>
                <td><input type="text" name="masa" value="<?php echo $jabatan["masa"];?>"></td>
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
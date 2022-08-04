<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<head><title>Tambah Jabatan Pegawai</title>
<script type="text/javascript" language="javascript">
function validasiJabatan() {
	if(document.frm.nik_pegawai.selectedIndex==0){
		alert("NIK Pegawai wajib dipilih.");
		document.frm.nik_pegawai.focus();
		return false;
	}
	var jenis_jabatan=document.frm.jenis_jabatan.value.trim();
	if(jenis_jabatan.length==0){
		alert("Jenis Jabatan tidak boleh kosong.");
		document.frm.jenis_jabatan.focus();
		return false;
	}
	var masa=document.frm.masa.value.trim();
	if(jumlah.length==0){
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
    <h1>Tambah Data Pegawai</h1>
    <form method="POST" name="frm" action="jabatan-simpan.php" onsubmit="return validasiMasa()">
        <table border="1">
            <tr>
                <td>NIK Pegawai</td>
                <td><select name="nik_pegawai" name="nik_pegawai">
		            <option>Pilih Pegawai</option>
		                <?php
			            $datapegawai=getListPegawai();
			            foreach($datapegawai as $data){
				        echo "<option value=\"".$data["nik_pegawai"]."\">".$data["nik_pegawai"]."</option>";
			            }
		                ?></select>
                </td>
            </tr>
            <tr>
                <td>Jenis Jabatan</td>
                <td><input type="text" name="jenis_jabatan" size="25" maxlength="26"></td>
            </tr>
            <tr>
                <td>Masa</td>
                <td><input type="text" name="masa"></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="tblsimpan" value="Simpan">
    </form>
</body>
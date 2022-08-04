<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<head><title>Tambah cuti Pegawai</title>
<script type="text/javascript" language="javascript">
function validasiCuti() {
	if(document.frm.nik_pegawai.selectedIndex==0){
		alert("NIK Pegawai wajib dipilih.");
		document.frm.nik_pegawai.focus();
		return false;
	}
	var tgl=document.frm.tgl_cuti.value.trim();
	if(tgl.length==0){
		alert("Tanggal tidak boleh kosong.");
		document.frm.tgl_cuti.focus();
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
    <h1>Tambah Data Pegawai</h1>
    <form method="POST" name="frm" action="cuti-simpan.php" onsubmit="return validasiCuti()">
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
                <td>Tanggal Cuti</td>
                <td><input type="date" name="tgl_cuti"></td>
            </tr>
            <tr>
                <td>Jumlah Cuti</td>
                <td><input type="text" name="jumlah"></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="tblsimpan" value="Simpan">
    </form>
</body>
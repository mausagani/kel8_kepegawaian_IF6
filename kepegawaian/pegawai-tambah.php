<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html>
<head><title>View Data Pegawai</title>
<script type="text/javascript" language="javascript">
function validasidatapegawai() {
	var nik_pegawai=document.frm.nik_pegawai.value.trim();
	if(nik_pegawai.length==0){
		alert("NIK Pegawai tidak boleh kosong.");
		document.frm.nik_pegawai.focus();
		return false;
	}
	var nama=document.frm.nama.value.trim();
	if(nama.length==0){
		alert("Nama Pegawai tidak boleh kosong.");
		document.frm.nama.focus();
		return false;
	}
	var usia=document.frm.usia.value.trim();
	if(usia.length==0){
		alert("Usia Pegawai tidak boleh kosong.");
		document.frm.usia.focus();
		return false;
	}
	var jk=document.frm.jk.value.trim();
	if(jk.length==0){
		alert("Jenis Kelamin Pegawai tidak boleh kosong.");
		document.frm.jk.focus();
		return false;
	}
	var alamat=document.frm.alamat.value.trim();
	if(alamat.length==0){
		alert("Alamat Pegawai tidak boleh kosong.");
		document.frm.alamat.focus();
		return false;
	}
	var no_telpon=document.frm.no_telpon.value.trim();
	if(no_telpon.length==0){
		alert("No Telepon Pegawai tidak boleh kosong.");
		document.frm.no_telpon.focus();
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
<a href="pegawai.php"><button>View Pegawai</button></a>
<form method="post" name="frm" action="pegawai-simpan.php" onsubmit="return validasidatapegawai()">
<table border="1">
<tr><td>NIK Pegawai</td>
    <td><input type="text" name="nik_pegawai" size="8" maxlength="9"></td></tr>
<tr><td>Nama</td>
    <td><input type="text" name="nama" size="50" maxlength="51"></td></tr>
<tr><td>Usia</td>
	<td><input type="text" name="usia" size="5" maxlength="6"></td></tr>
<tr><td>Jenis Kelamin</td>
	<td><input type="text" name="jk" size="1" maxlength="2"></td></tr>
<tr><td>Alamat</td>
	<td><input type="text" name="alamat" size="100" maxlength="101"></td></tr>
<tr><td>No Telepon</td>
	<td><input type="text" name="no_telpon" size="13" maxlength="14"></td></tr>
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblSimpan" value="Simpan"></td></tr>
</table>
</form>
</body>
</html>
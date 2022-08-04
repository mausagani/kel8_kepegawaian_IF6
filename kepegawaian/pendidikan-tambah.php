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
	if(document.frm.nik_pegawai.selectedIndex==0){
		alert("NIK Pegawai wajib dipilih.");
		document.frm.nik_pegawai.focus();
		return false;
	}
	var perguruan=document.frm.perguruan.value.trim();
	if(perguruan.length==0){
		alert("perguruan tidak boleh kosong.");
		document.frm.perguruan.focus();
		return false;
	}
	var sma=document.frm.sma.value.trim();
	if(sma.length==0){
		alert("SMA/SMK tidak boleh kosong.");
		document.frm.sma.focus();
		return false;
	}
	var smp=document.frm.smp.value.trim();
	if(smp.length==0){
		alert("SMP tidak boleh kosong.");
		document.frm.smp.focus();
		return false;
	}
    var sd=document.frm.sd.value.trim();
	if(sd.length==0){
		alert("SD tidak boleh kosong.");
		document.frm.sd.focus();
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
<a href="pendidikan.php"><button>View Pendidikan</button></a>
<form method="post" name="frm" action="pendidikan-simpan.php" onsubmit="return validasidatapegawai()">
<table border="1">
<tr><td>NIK Pegawai</td>
    <td><select name="nik_pegawai">
		<option>Pilih Pegawai</option>
		<?php
			$datapegawai=getListPegawai();
			foreach($datapegawai as $data){
				echo "<option value=\"".$data["nik_pegawai"]."\">".$data["nik_pegawai"]."</option>";
			}
		?>
		</select>
	</td></tr>
<tr><td>Perguruan</td>
	<td><input type="text" name="perguruan" size="50" maxlength="51"></td></tr>
<tr><td>SMA</td>
	<td><input type="text" name="sma" size="50" maxlength="51"></td></tr>
<tr><td>SMP</td>
	<td><input type="text" name="smp" size="50" maxlength="51"></td></tr>
<tr><td>SD</td>
	<td><input type="text" name="sd" size="50" maxlength="51"></td></tr>
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblSimpan" value="Simpan"></td></tr>
</table>
</form>
</body>
</html>
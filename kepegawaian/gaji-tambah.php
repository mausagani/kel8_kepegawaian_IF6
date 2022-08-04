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
	var gaji_pokok=document.frm.gaji_pokok.value.trim();
	if(gaji_pokok.length==0){
		alert("Gaji Pokok tidak boleh kosong.");
		document.frm.gaji_pokok.focus();
		return false;
	}
	var upah_lembur=document.frm.upah_lembur.value.trim();
	if(upah_lembur.length==0){
		alert("Upah Lembur tidak boleh kosong.");
		document.frm.upah_lembur.focus();
		return false;
	}
	var tunjangan=document.frm.tunjangan.value.trim();
	if(tunjangan.length==0){
		alert("Tunjangan tidak boleh kosong.");
		document.frm.tunjangan.focus();
		return false;
	}
    var pajak=document.frm.pajak.value.trim();
	if(pajak.length==0){
		alert("Pajak tidak boleh kosong.");
		document.frm.pajak.focus();
		return false;
	}
    var total_gaji=document.frm.total_gaji.value.trim();
	if(total_gaji.length==0){
		alert("Total Gaji tidak boleh kosong.");
		document.frm.total_gaji.focus();
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
<a href="gaji.php"><button>View Gaji</button></a>
<form method="post" name="frm" action="gaji-simpan.php" onsubmit="return validasidatapegawai()">
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
<tr><td>Gaji Pokok</td>
	<td><input type="text" name="gaji_pokok" size="15" maxlength="16"></td></tr>
<tr><td>Upah Lembur</td>
	<td><input type="text" name="upah_lembur" size="15" maxlength="16"></td></tr>
<tr><td>Tunjangan</td>
	<td><input type="text" name="tunjangan" size="15" maxlength="16"></td></tr>
<tr><td>Pajak</td>
	<td><input type="text" name="pajak" size="15" maxlength="16"></td></tr>
<tr><td>Total Gaji</td>
	<td><input type="text" name="total_gaji" size="15" maxlength="16"></td></tr>
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblSimpan" value="Simpan"></td></tr>
</table>
</form>
</body>
</html>
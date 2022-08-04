<?php
	session_start();
		if (!isset($_SESSION["username"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Edit Data Pegawai</title>
<script type="text/javascript" language="javascript">
function validasidatapegawai() {
	if(document.frm.nik_pegawai.selectedIndex==0){
		alert("NIK Pegawai wajib dipilih.");
		document.frm.nik_pegawai.focus();
		return false;
	}
	var nama=document.frm.nama.value.trim();
	if(nama.length==0){
		alert("Nama tidak boleh kosong.");
		document.frm.nama.focus();
		return false;
	}
	var usia=document.frm.usia.value.trim();
	if(sma.length==0){
		alert("Usia tidak boleh kosong.");
		document.frm.usia.focus();
		return false;
	}
	var jk=document.frm.jk.value.trim();
	if(jk.length==0){
		alert("Jenis Kelamin tidak boleh kosong.");
		document.frm.jk.focus();
		return false;
	}
    var alamat=document.frm.alamat.value.trim();
	if(alamat.length==0){
		alert("Alamat tidak boleh kosong.");
		document.frm.alamat.focus();
		return false;
	}
    var no_telpon=document.frm.no_telpon.value.trim();
	if(no_telpon.length==0){
		alert("Nomer Telepon tidak boleh kosong.");
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
<h1>Edit Data Pegawai</h1>
<?php
if(isset($_GET["nik_pegawai"])){
	$db=dbConnect();
	$nik_pegawai=$db->escape_string($_GET["nik_pegawai"]);
	if($datapegawai=getDataPegawai($nik_pegawai)){// cari data produk, kalau ada simpan di $data
		?>
<a href="pegawai.php"><button>View Pegawai</button></a>
<form method="post" name="frm" action="pegawai-update.php" onsubmit="return validasidatapegawai()">
<table border="1">
<tr><td>NIK_Pegawai</td>
    <td><input type="text" name="nik_pegawai" size="8" maxlength="9"
	     value="<?php echo $datapegawai["nik_pegawai"];?>" readonly></td></tr>
<tr><td>Nama</td>
    <td><input type="text" name="nama" size="50" maxlength="51"
		 value="<?php echo $datapegawai["nama"];?>"></td></tr>
<tr><td>Usia</td>
    <td><input type="text" name="usia" size="5" maxlength="6"
		 value="<?php echo $datapegawai["usia"];?>"></td></tr>
<tr><td>Jenis Kelamin</td>
    <td><input type="text" name="jk" size="1" maxlength="2"
		 value="<?php echo $datapegawai["jk"];?>"></td></tr>
<tr><td>Alamat</td>
    <td><input type="text" name="alamat" size="100" maxlength="101"
		 value="<?php echo $datapegawai["alamat"];?>"></td></tr>
<tr><td>No Telepon</td>
    <td><input type="text" name="no_telpon" size="13" maxlength="14"
		 value="<?php echo $datapegawai["no_telpon"];?>"></td></tr>
         <tr><td>&nbsp;</td>
	<td><input type="submit" name="TblUpdate" value="Update">
	    <input type="reset"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "NIK_Pegawai dengan kode : $nik_pegawai tidak ada. Pengeditan dibatalkan";
?>
<?php
}
else
	echo "NIK Pegawai tidak ada. Pengeditan dibatalkan.";
?>
</body>
</html>
<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
	$db=new mysqli("localhost","root","","kel8_pegawai");// Sesuaikan dengan konfigurasi server anda.
	return $db;
}
// getListKategori digunakan untuk mengambil seluruh data dari tabel produk

function formatTanggal($date){
	return date('Y-m-d', strtotime($date));
}

function getDataCuti($nik){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql="SELECT * FROM cuti WHERE nik_pegawai='$nik'";
		$res=$db->query($sql);
		if($res){
			$data=$res->fetch_assoc();
			$res->free();
			return $data;
		}else{
			return false;
		}
	}
	return false;
}

function getListPegawai(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * 
						 FROM pegawai
						 ORDER BY nik_pegawai");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

// digunakan untuk mengambil data sebuah produk
function getDataPegawai($nik_pegawai){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT nik_pegawai,nama,usia,jk,alamat,no_telpon FROM pegawai WHERE nik_pegawai='$nik_pegawai'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getDataPendidikan($no){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT no,nik_pegawai,perguruan,sma,smp,sd FROM pendidikan WHERE no='$no'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getDataGaji($no){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT no,nik_pegawai,gaji_pokok,upah_lembur,tunjangan,pajak,total_gaji FROM gaji WHERE no='$no'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getDataJabatan($nik){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM jabatan WHERE nik_pegawai='$nik'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function banner(){
	?>
<div id="banner"><h1><center>PT. Pegawai Direktur Dadang</h1></center>
</div>
	<?php
}
function navigator(){
	?>
<div id="navigator">
| <a href="pegawai.php">Pegawai</a> 
| <a href="pendidikan.php">Pendidikan</a> 
| <a href="jabatan.php">Jabatan</a> 
| <a href="gaji.php">Gaji</a> 
| <a href="cuti.php">Cuti</a> 
| <a href="log.php">log</a> 
| <a href="logout.php">Keluar</a>
</div>
	<?php
}
function showError($message){
	?>
<div style="background-color:#FF0000;padding:10px;border:1px solid red;margin:15px 0px">
<?php echo $message;?>
</div>
	<?php
}
?>
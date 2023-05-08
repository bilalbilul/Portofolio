<?php 
include '../koneksi.php';
$idkucing = $_GET['idkucing'];
$sql = "UPDATE tb_detail_transaksi SET status='TIDAK JODOH' WHERE id_kucing = '$idkucing'";
$runsql = mysql_query($sql);


if($runsql){
	echo '<script language="javascript">';
	echo 'alert("Berhasil ditolak!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal ditolak!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}

?>
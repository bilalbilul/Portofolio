<?php 
include '../koneksi.php';
$idkucing = $_GET['idkucing'];
$id_transaksi = $_GET['id_transaksi'];

$sql = "UPDATE tb_detail_transaksi SET status='SETUJU' WHERE id_transaksi = '$id_transaksi'";
$runsql = mysql_query($sql);


if($runsql){
	echo '<script language="javascript">';
	echo 'alert("Berhasil Merespon Pengajuan!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal Merespon Pengajuan!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}

?>
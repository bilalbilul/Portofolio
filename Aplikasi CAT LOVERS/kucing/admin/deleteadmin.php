<?php 
include '../koneksi.php';
$id_transaksi = $_GET['id_transaksi'];


$delete = "DELETE FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'";
$rundelete = mysql_query($delete);

if($rundelete){
	echo '<script language="javascript">';
	echo 'alert("Berhasil dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="admincouple.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="admincouple.php";</script>';
}
?>
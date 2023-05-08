<?php 	
include '../koneksi.php';

$idtransaksi = $_GET['id_transaksi'];

$qdel = "DELETE FROM tb_transaksi WHERE id_transaksi = '$idtransaksi'";
$rdel = mysql_query($qdel);

if($rdel){
	echo '<script language="javascript">';
	echo 'alert("Berhasil dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="postingansaya.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="postingansaya.php";</script>';
}
 ?>

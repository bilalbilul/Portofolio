<?php
include '../koneksi.php';

$idcouple = $_GET['idcouple'];
$idpeminat = $_POST['kucing'];

$insert = "INSERT INTO tb_detail_transaksi(id_transaksi,id_kucing,id_user,status) VALUES ('".$idcouple."','".$idpeminat."', NULL,'DEFAULT')";
$runinsert = mysql_query($insert);

if($runinsert){
	echo '<script language="javascript">';
	echo 'alert("Proses Pencocokan Berhasil!")';
	echo '</script>';
	echo '<script language="javascript">document.location="couple.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Proses Pencocokan Gagal!")';
	echo '</script>';
	echo '<script language="javascript">document.location="couple.php";</script>';	
}
?>
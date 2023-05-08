<?php
include '../koneksi.php';
$sesi = $_SESSION['USER'];
$idcouple = $_GET['idcouple'];
$cariid = "SELECT id_user FROM tb_user WHERE username = '$sesi'";
$runcariid = mysql_query($cariid);
$outputrunid = mysql_fetch_array($runcariid);
$idgw = $outputrunid['id_user'];

$insert = "INSERT INTO tb_detail_transaksi(id_transaksi,id_kucing,id_user,status) VALUES ('".$idcouple."',NULL,'".$idgw."','DEFAULT')";
$runinsert = mysql_query($insert);

if($runinsert){
	echo '<script language="javascript">';
	echo 'alert("Proses Pengajuan Adopsi Berhasil!")';
	echo '</script>';
	echo '<script language="javascript">document.location="adopt.php";</script>';	
}else{
	echo '<script language="javascript">';
	echo 'alert("Proses Pengajuan Adopsi Gagal!")';
	echo '</script>';
	echo '<script language="javascript">document.location="adopt.php";</script>';	
}
?>
<?php
include "../koneksi.php";

$id_kucing = $_GET['idkucing'];
$id_user = $_GET['iduser'];

$insert = "INSERT INTO tb_transaksi (id_transaksi,id_user,id_kucing,kategori) VALUES ('','$id_user','$id_kucing','COUPLE')";
$runinsert = mysql_query($insert);

if($runinsert){
	echo '<script language="javascript">';
	echo 'alert("Post Berhasil!")';
	echo '</script>';
	echo '<script language="javascript">document.location="couple.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Post Gagal!")';
	echo '</script>';
	echo '<script language="javascript">document.location="menupost.php";</script>';
}
?>
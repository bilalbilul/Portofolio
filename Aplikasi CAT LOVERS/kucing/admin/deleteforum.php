<?php
include '../koneksi.php';

$idforum = $_GET['id'];

$qdel = "DELETE FROM tb_forum WHERE id_forum = '$idforum'";
$qdel1 = "DELETE FROM tb_detail_forum WHERE id_forum = '$idforum'";
$rdel = mysql_query($qdel);
$rdel1 = mysql_query($qdel1);

if($rdel1 && $rdel){
echo '<script language="javascript">';
	echo 'alert("Berhasil dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="adminforum.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="adminforum.php";</script>';
}
?>
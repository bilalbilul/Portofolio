<?php
include "../koneksi.php";
$idkucing = $_GET['idkucing'];
$delete = "DELETE FROM tb_kucing WHERE id_kucing = '$idkucing'";
$execute = mysql_query($delete);

if($execute){
	echo '<script language="javascript">';
	echo 'alert("Berhasil dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}?>
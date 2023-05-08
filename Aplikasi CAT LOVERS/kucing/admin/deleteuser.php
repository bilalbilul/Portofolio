<?php 
include '../koneksi.php';
$id_user = $_GET['id_user'];


$delete = "DELETE FROM tb_user WHERE id_user = '$id_user'";
$rundelete = mysql_query($delete);

if($rundelete){
	echo '<script language="javascript">';
	echo 'alert("Berhasil dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="datauser.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal dihapus!")';
	echo '</script>';
	echo '<script language="javascript">document.location="datauser.php";</script>';
}
?>
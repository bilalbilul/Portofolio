<?php 
include '../koneksi.php';
$idkucing = $_GET['idkucing'];
$sql = "UPDATE tb_detail_transaksi SET status='JODOH' WHERE id_kucing = '$idkucing'";
$runsql = mysql_query($sql);


if($runsql){
	echo '<script language="javascript">';
	echo 'alert("Berhasil dijodohkan!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal dijodohkan!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}

?>
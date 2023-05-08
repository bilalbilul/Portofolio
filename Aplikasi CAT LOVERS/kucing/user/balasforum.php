<!DOCTYPE html>
<html>
<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$now = date("Y-m-d");

$id_forum = $_GET['id'];
$sesi = $_SESSION['USER'];

$querycheck = "SELECT id_user,username FROM tb_user WHERE username='$sesi'";
$runcheck = mysql_query($querycheck);
$fetchcheck = mysql_fetch_array($runcheck);
?>
<head>
	<title>Balas Forum</title>
	<link href="../css/forum.css" rel="stylesheet">
</head>
<body>
<div class="header">CAT LOVERS</div>
<div class="sidenav">
<div class="tulisan"> 
  <CENTER><img src="../gambar/123.jpg" width="120px" height="100px" ></CENTER>		
  <a href="">User Control Panel</a>
  <a href="">Buat Post</a>
  <a href="" >Logout</a>
</div>
</div>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="couple.php">Need Couple</a>
  <a href="adopt.php">Need Adopt</a>
  <a href="forum.php">Forum </a>
</div>
<br><br><br>
<?php
$queryselect = "SELECT judul_forum FROM tb_forum WHERE id_forum = '$id_forum'";
$runselect = mysql_query($queryselect);
$fetchselect = mysql_fetch_array($runselect);

$querycheck = "SELECT id_user,username FROM tb_user WHERE username='$sesi'";
$runcheck = mysql_query($querycheck);
$fetchcheck = mysql_fetch_array($runcheck);

if(isset($_POST['reply'])){

$id_user = $_POST['id_user'];
$id_forum = $_POST['id_forum'];
$judul_balasan = $_POST['judul_balasan'];
$isi_balasan = $_POST['isi_balasan'];
$tanggal_balasan = $_POST['tanggal_balasan'];
$queryinsert = "INSERT INTO tb_detail_forum (id_balasan,id_forum,id_user,judul_balasan,isi_balasan,tanggal_balasan) VALUES (NULL, '$id_forum','$id_user','$judul_balasan','$isi_balasan','$tanggal_balasan')";
$runinsert = mysql_query($queryinsert);

$query_balasan = mysql_query("SELECT id_balasan FROM tb_detail_forum WHERE id_forum='$id_forum'");
$total_balas = mysql_num_rows($query_balasan);
$total_balasan = $total_balas;

$update = "UPDATE tb_forum SET total_balasan='$total_balasan' WHERE id_forum='$id_forum'";
if($runinsert){
	$runupdate = mysql_query($update);
	echo '<script language="javascript">';
	echo 'alert("Berhasil Posting Forum!")';
	echo '</script>';
	echo '<script type="text/javascript">history.go(-2);</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal Posting Forum!")';
	echo '</script>';
	echo '<script language="javascript">document.location="forum.php";</script>';
}
}
?>
<center>
<table class="buat" width="700px" height="200px">
<form method="POST">
		<input type="hidden" name="id_forum" value="<?php echo $id_forum ?>">
		<input type="hidden" name="id_user" value="<?php echo $fetchcheck['id_user']?>">
		<input type="hidden" name="tanggal_balasan" value="<?php echo $now?>">
		<tr>
		<td>Judul</td>
		<td>:</td>
		<td><input class="input" type="text" name="judul_balasan" value="Re: <?php echo $fetchselect['judul_forum'] ?>"></td>

	</tr>
	<tr>
		<td>Isi</td>
		<td>:</td>
		<td><textarea name="isi_balasan"></textarea></td>
	</tr>		
	<td><input class="button" type="submit" name="reply" value="Reply"></td>
</form>
</table>
</center>
</div>
</body>
</html>
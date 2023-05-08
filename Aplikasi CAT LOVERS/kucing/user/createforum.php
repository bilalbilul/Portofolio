<!DOCTYPE html>
<html>
<?php
include "../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$now = date("Y-m-d");
$sesi = $_SESSION['USER'];

$querycheck = "SELECT id_user,username FROM tb_user WHERE username='$sesi'";
$runcheck = mysql_query($querycheck);
$fetchcheck = mysql_fetch_array($runcheck);

if(isset($_POST['post'])){

$id_user = $_POST['id_user'];
$judul_forum = $_POST['judul_forum'];
$isi_forum = $_POST['isi_forum'];
$tanggal_forum = $_POST['tanggal_forum'];
$queryinsert = "INSERT INTO tb_forum (id_forum,id_user,judul_forum,isi_forum,tanggal_forum,total_balasan) VALUES (NULL,'$id_user','$judul_forum','$isi_forum','$tanggal_forum', '0')";
$runinsert = mysql_query($queryinsert);

if($runinsert){
	echo '<script language="javascript">';
	echo 'alert("Berhasil Posting Forum!")';
	echo '</script>';
	echo '<script language="javascript">document.location="forum.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal Posting Forum!")';
	echo '</script>';
	echo '<script language="javascript">document.location="createforum.php";</script>';
}
}
?>
<head>
	<title>Create Forum</title>
	<link href="../css/forum.css" rel="stylesheet">
</head>
<body>
<div class="header"> CAT LOVERS</div>
<div class="sidenav">
<div class="tulisan"> 
  <CENTER><img src="../gambar/123.jpg" width="120px" height="100px" ></CENTER>		
  <a href="profile.php">User Control Panel</a>
  <a href="createforum.php">Buat Post</a>
  <a href="../logout.php">Logout</a>
</div>
</div>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="couple.php">Need Couple</a>
  <a href="adopt.php">Need Adopt</a>
  <a href="forum.php">Forum </a>
</div>
<center>
	<h1>Buat Post Forum</h1>
<table class="buat" width="700px" height="200px" >
<form method="POST" action="createforum.php">
<input name="tanggal_forum" type="hidden" value="<?php echo $now ?>">
<input name="id_user" type="hidden" value="<?php echo "".$fetchcheck['id_user'].""; ?>">
	<tr>
		<td>Author</td>
		<td>:</td>
		<td><input name="author" class="input" type="text" value="<?php echo $fetchcheck['username'] ?>" readonly></td>
	</tr>
	<tr>
		<td>Judul</td>
		<td>:</td>
		<td><input name="judul_forum" class="input" type="text" value=""></td>
	</tr>
	<tr>
		<td>Isi</td>
		<td>:</td>
		<td><textarea name="isi_forum"></textarea></td>
	</tr>		
	<td><input class="button" type="submit" name="post" value="Post"></td>
</form>
</table>
</center>
</div>
</body>
</html>
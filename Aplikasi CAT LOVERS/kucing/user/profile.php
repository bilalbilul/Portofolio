<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="../css/menu.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
include ('../koneksi.php');

$sesion = $_SESSION['USER'];
$query = "SELECT * FROM tb_user WHERE username='$sesion'";
$quer1 = mysql_query($query);
$fetch = mysql_fetch_array($quer1);
?><table>
	<table width="80%" border="0">
		<tr>
<td ><h1>Profile</h1></td>
<td align="right" width="10%"><a href="index.php"><button class="button" value="Tambah">Home</button></a></td>
	</tr>
</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<div class="table4">
<div class="container">
<table>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><?php echo $fetch['username']; ?></td>
		</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><?php echo $fetch['nama_lengkap']; ?></td>
		</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo $fetch['jenis_kelamin']; ?></td>
		</tr>
	<tr>
		<td>No.Hp</td>
		<td>:</td>
		<td><?php echo $fetch['nomor_hp']; ?></td>
		</tr>	
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $fetch['domisili']; ?></td>
	</tr>				
			
</table>
</div>
<div class="simbol">
<a href="ubahdata.php"><button class="button">Ubah Data</button></a><br>
<A href="postingansaya.php"><button class="button">Postingan Saya</button></a><br>
<a href="kucingsaya.php"><button class="button">Kucing Saya</button></a><br>
</div>
</div>
</body>
</html>
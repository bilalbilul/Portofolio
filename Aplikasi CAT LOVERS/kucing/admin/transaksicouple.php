<!DOCTYPE html>
<html>
<?php 
include '../koneksi.php'; ?>
<head>
	<title>Transaksi Couple</title>
	<link href="../css/admincss.css" rel="stylesheet">
</head>
<body>
<table width="70%" align="center">
	<tr>
<td><h1 class="h1">Transaksi Couple</h1></td>
<td><a href="../admin/index.php"><button class="button">Home</button></a></td>
	<tr>
</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<div class="container">
<?php 
$id_kucing = $_GET['id'];
$id_transaksi = $_GET['idt'];

$qpm = "SELECT u.nama_lengkap,u.nomor_hp,u.jenis_kelamin,u.domisili,k.umur_kucing,k.ras_kucing FROM tb_transaksi t
JOIN tb_kucing k ON k.id_kucing = t.id_kucing
JOIN tb_user u ON u.id_user = t.id_user
WHERE t.id_kucing = '$id_kucing'";
$rpm = mysql_query($qpm);
$fpm = mysql_fetch_array($rpm);

$select = "SELECT dc.id_transaksi,dc.id_kucing,u.nama_lengkap,u.jenis_kelamin,u.nomor_hp,u.domisili,k.ras_kucing,k.umur_kucing,k.jk_kucing,k.gambar_kucing,c.kategori
FROM tb_detail_transaksi dc
INNER JOIN tb_transaksi c ON dc.id_transaksi = c.id_transaksi
INNER JOIN tb_kucing k ON dc.id_kucing = k.id_kucing
INNER JOIN tb_user u ON k.id_user = u.id_user
WHERE dc.id_transaksi = '$id_transaksi' AND dc.status = 'JODOH'";
$run = mysql_query($select);
$fs = mysql_fetch_array($run);
?>
<table class="table" border="0" cellpadding="2" cellspacing="0">
<tr>
	<td>Nama Pemilik</td>
	<td>:</td>
	<td><?php echo $fpm['nama_lengkap']; ?></td>
	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	<td>Ras Kucing</td>
	<td>:</td>
	<td><?php echo $fs['ras_kucing']; ?></td>
</tr>
<tr>	
	<td>Ras kucing</td>
	<td>:</td>
	<td><?php echo $fpm['ras_kucing']; ?></td>
		<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	<td>No.Hp</td>
	<td>:</td>
	<td><?php echo $fs['nomor_hp']; ?></td>
</tr>
<tr>
	<td>umur kucing</td>
	<td>:</td>
	<td><?php echo $fpm['umur_kucing']; ?></td>
		<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	<td>Umur Kucing</td>
	<td>:</td>
	<td><?php echo $fs['umur_kucing']; ?></td>
</tr>
<tr>
	<td>No.Hp</td>
	<td>:</td>
	<td><?php echo $fpm['nomor_hp']; ?></td>
		<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	<td>Jenis Kelamin</td>
	<td>:</td>
	<td><?php echo $fs['jenis_kelamin']; ?></td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td>:</td>
	<td><?php echo $fpm['jenis_kelamin']; ?></td>
			<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	<td>Alamat</td>
	<td>:</td>
	<td><?php echo $fs['domisili']; ?></td>
</tr>
<tr>
	<td>Alamat</td>
	<td>:</td>
	<td><?php echo $fpm['domisili']; ?></td>
			<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	<td>Nama Pemilik</td>
	<td>:</td>
	<td><?php echo $fs['nama_lengkap']; ?></td>
</tr>
</table>	
</div>		
</body>
</html>
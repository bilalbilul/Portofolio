<!DOCTYPE html>
<html>
<head>
	<title>Detail Pengajuan Adopt</title>
	<link href="../css/menu.css" rel="stylesheet">
</head>
<body>
<?php
include '../koneksi.php';

$idkucing = $_GET['idkucing'];
$id_transaksi = $_GET['id_transaksi'];

$select = "SELECT dc.id_transaksi,dc.id_user,u.nama_lengkap,u.jenis_kelamin,u.nomor_hp,u.domisili
FROM tb_detail_transaksi dc
INNER JOIN tb_transaksi c ON dc.id_transaksi = c.id_transaksi
INNER JOIN tb_user u ON dc.id_user = u.id_user
WHERE c.id_transaksi = '$id_transaksi'";
$run = mysql_query($select);

?>
<h1>Detail Pengajuan Adopt</h1>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<div class="container">	
<div class="row">
    <?php 
    while ($running = mysql_fetch_array($run)) {
    ?>
  <div class="column middle">
    <div class="table"><table border="0">
    <tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><input class="profile" type="text" id="namar" name="nama" value="<?php echo $running['nama_lengkap'];?>"></td>
		<td></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><input class="profile" type="text" id="jk" name="jeniskelamin" value="<?php echo $running['jenis_kelamin'];?>"></td>
	</tr>
	<tr>
		<td>No.Hp</td>
		<td>:</td>
		<td><input class="profile" type="nuber" id="nohp" name="nohp" value="<?php echo $running['nomor_hp'];?>"></td>
		<td></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><textarea class="profile" rows='1' id="alamat" name="alamat"><?php echo $running['domisili'];?></textarea></td>
		<td></td>

	</tr>		
		</table>
<table width="200px"><tr><td align="center"><a href="updatestatus3.php?idkucing=<?php echo $idkucing;?>&id_transaksi=<?php echo $running['id_transaksi'];?>"><button class="button" type="submit" name="submit">Setuju</button></a></td>
<td align="center"><a href="updatestatus4.php?idkucing=<?php echo $running['id_kucing'];?>&id_transaksi=<?php echo $running['id_transaksi'];?>"><button class="button" type="submit" name="submit">Tolak</button></a></td></tr></table>
<?php
}
?>		

		</div>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<?php
include "../koneksi.php";

$id_user = $_GET['iduser'];
$id_kucing = $_GET['idkucing'];

$select = "SELECT t.id_transaksi, t.id_user, t.id_kucing, t.kategori, u.nama_lengkap, u.nomor_hp, u.domisili, k.ras_kucing, k.umur_kucing, k.jk_kucing, k.gambar_kucing
            FROM tb_transaksi t
            INNER JOIN tb_user u ON u.id_user = t.id_user
            INNER JOIN tb_kucing k ON k.id_kucing = t.id_kucing
			WHERE u.id_user = '$id_user' AND k.id_kucing = '$id_kucing'";
$runselect = mysql_query($select);
$loop = mysql_fetch_array($runselect);
?>
<head>
	<title>Post Detail</title>
	<link href="../css/menu.css" rel="stylesheet">
</head>
<body>
<table width="80%" border="0">
		<tr>
<td ><h1>Post Detail</h1></td>
<td align="right" width="10%">
<?php
if($loop['kategori'] == "COUPLE"){
echo '<a href="couple.php"><button class="button" value="Tambah">Kembali</button></a>';
}else{
echo '<a href="adopt.php"><button class="button" value="Tambah">Kembali</button></a>';	
}
?>
</td>
	</tr>
</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<div class="container">
<center><img  class="gambar" src="../photos/<?php echo $loop['gambar_kucing'];?>" width="150px" height="150px"></center>
<div class="table">
	<table>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><input class="profile" type="text" id="namapemilik" name="namapemilik" value="<?php echo $loop['nama_lengkap']; ?>" readonly></td>
		</tr>	
	<tr>
		<td>No.Hp</td>
		<td>:</td>
		<td><input class="profile" type="text" id="hp" name="hp" value="<?php echo $loop['nomor_hp']; ?>"readonly></td>
		</tr>	
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><input class="profile" type="text" id="alamat" name="alamat" value="<?php echo $loop['domisili']; ?>"readonly></td>
		</tr>
	<tr>
		<td>Ras kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" id="ras" name="ras" value="<?php echo $loop['ras_kucing']; ?>"readonly></td>
		</tr>	
	<tr>
		<td>Umur Kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" id="umur" name="umur" value="<?php echo $loop['umur_kucing']; ?>"readonly></td>
		</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><input class="profile" type="text" id="kelamin" name="kelamin" value="<?php echo $loop['jk_kucing']; ?>"readonly></td>
		</tr>		
</div>			
</table>
</div>
</body>
</html>
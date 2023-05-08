<!DOCTYPE html>
<html>
<head>
	<title>Postingan Saya</title>
	<link href="../css/menu.css" rel="stylesheet">
</head>
<body>
<table width="80%" border="0">
		<tr>
<td ><h1>Postingan Saya</h1></td>
<td align="right" width="10%"><a href="profile.php"><button class="button" value="Tambah">Kembali</button></a></td>
	</tr>

</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<div class="container">

  <?php 
    include '../koneksi.php';

    $sesi = $_SESSION['USER'];
    $select = "SELECT dt.id_transaksi, dt.id_user, dt.id_kucing, dt.kategori, k.ras_kucing, k.umur_kucing, k.jk_kucing, k.gambar_kucing
				FROM tb_transaksi dt
				JOIN tb_kucing k ON dt.id_kucing = k.id_kucing
				JOIN tb_user u ON dt.id_user = u.id_user
				WHERE u.username = '$sesi'";
	$runselect = mysql_query($select);

	while($loop = mysql_fetch_array($runselect)) {
    ?>
       <div class="row">
  <div class="column side">
 <img  class="gambarpost" src="../photos/<?php echo $loop['gambar_kucing'];?>" width="150px" height="140px">
  </div>
  <div class="column middle">
    <div class="table">
    	<table border="0">
	<tr>
		<td>Ras Kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" id="user" name="raskucing" value="<?php echo $loop['ras_kucing'] ?>"></td>
		</tr>
	<tr>
		<td>Umur Kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" id="user" name="umurkucing" value="<?php echo $loop['umur_kucing'] ?>"></td>
		<?php 
		if($loop['kategori'] == "COUPLE"){
		?>
		<td><a href="detailpasangan.php?idkucing=<?php echo $loop['id_kucing'];?>"><button class="button" type="submit" name="submit">Detail</button></a><br><a href="deletepost.php?id_transaksi=<?php echo $loop['id_transaksi'];?>"><button class="button" type="submit" name="submit">Delete</button></a>
		</td>
		<?php
		}else{
		?>
		<td><a href="detailadopt.php?idkucing=<?php echo $loop['id_kucing'];?>&id_transaksi=<?php echo $loop['id_transaksi'];?>"><button class="button" type="submit" name="submit">Detail</button></a><br><a href="deletepost.php?idkucing=<?php echo $loop['id_kucing'];?>&id_transaksi=<?php echo $loop['id_transaksi'];?>"><button class="button" type="submit" name="submit">Delete</button></a></td>
		<?php
		}
		?>
		</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><input class="profile" type="text" id="kelaminkucing" value="<?php echo $loop['jk_kucing'] ?>"></td>
		<td></td>
	</tr>		
			</div>			
	</table>
	</div>
</div>
</div>
		<?php } ?>
</body>
</html>
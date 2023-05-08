<!DOCTYPE html>
<html>
<head>
	<title>Kucing Saya</title>
	<link href="../css/menu.css" rel="stylesheet">
</head>
<?php
session_start();
include ('../koneksi.php');

$sesion = $_SESSION['USER'];
$query = "SELECT * FROM tb_user WHERE username='$sesion'";
$quer1 = mysql_query($query);
$fetch = mysql_fetch_array($quer1);
$id = $fetch['id_user'];


$query2 = "SELECT * FROM tb_kucing WHERE id_user = '$id'";
$listkucing = mysql_query($query2);
$listkucing2 = mysql_query($query2);
$execute = mysql_fetch_array($listkucing);

$select = "SELECT t.id_transaksi, t.id_user, t.id_kucing, t.kategori, k.ras_kucing, k.umur_kucing, k.jk_kucing, k.gambar_kucing
            FROM tb_transaksi t
            INNER JOIN tb_user u ON u.id_user = t.id_user
            INNER JOIN tb_kucing k ON k.id_kucing = t.id_kucing
            ORDER BY t.id_transaksi ASC";
$runselect = mysql_query($select);
$jalaninselect = mysql_fetch_array($runselect);
?>
<body>
	<table width="80%" border="0">
		<tr>
<td ><h1>Pilih Kucing</h1></td>
<td align="right" width="10%"><a href="couple.php"><button class="button" value="Tambah">Back</button></a></td>
	</tr>
</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<!--konten-->


<?php 
$idminat = $_GET['idkucing'];
$idcouple = $_GET['idcouple'];
if(empty($execute) OR $execute === NULL){
echo "<center>No Data</center>";
}else{
echo'<div class="container">';	
echo '<form method="POST" action="pasangkanact.php?idcouple='.$idcouple.'">';
echo '<table  border="0" align="center" >';
while($execute1 = mysql_fetch_assoc($listkucing2)){?>
	<tr>
<td rowspan="4"><input type="radio" name="kucing" value="<?php echo $execute1['id_kucing'];?>"></td>
</tr>
	<tr>
		<td rowspan="4"><img src="../photos/<?php echo $execute1['gambar_kucing']; ?>" width="100px" height="100ox"></td>
	</tr>
	<tr>
		<td><font face="comic" size="5" color="white">Ras Kucing</font></td>
		<td><font face="comic" size="5" color="white">:</font></td>
		<td><input class="profile" type="text" id="user" name="raskucing" value="<?php echo $execute1['ras_kucing'];?>" readonly></td>
		</tr>
	<tr>
		<td><font face="comic" size="5" color="white">Umur Kucing</font></td>
		<td><font face="comic" size="5" color="white">:</font></td>
		<td><input class="profile" type="text" id="user" name="umurkucing" value="<?php echo $execute1['umur_kucing'];?>" readonly ></td>
		</tr>
	<tr>
		<td></td>
		<td><font face="comic" size="5" color="white">Jenis Kelamin</font></td>
		<td><font face="comic" size="5" color="white">:</font></td>
		<td><input class="profile" type="text" id="kelaminkucing" value="<?php echo $execute1['jk_kucing'];?>" readonly></td>
	</tr>		
</input>
<?php }
}
?>	
<center><input type="submit" class="button" type="submit" name="daftar" value="PASANGKAN"/></center>	
</table>
</form>

<!--end konten-->
</body>
	
</html>
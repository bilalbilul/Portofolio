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



?>
<body>
	<table width="80%" border="0">
		<tr>
<td ><h1>Kucing Saya</h1></td>
<td align="right" width="10%"><a href="tambahkucing.php?id=<?php echo $fetch['id_user'];?>"><button class="button" value="Tambah">Tambah</button></a></td>
<td align="right" width="10%"><a href="profile.php"><button class="button" value="Tambah">Back</button></a></td>
	</tr>
</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<!--konten-->


<?php 
if(empty($execute) OR $execute === NULL){
echo "<center>No Data</center>";
}else{
echo'<div class="container">';	
echo '<table  border="0" align="center" >';
while($execute1 = mysql_fetch_assoc($listkucing2)){
	$idkucingnya = $execute1['id_kucing'];
	$query3 = "SELECT COUNT(id_kucing) AS KC FROM tb_transaksi WHERE id_kucing='$idkucingnya'";
	$runquery3 = mysql_query($query3);
	$fetch = mysql_fetch_array($runquery3);?>
	<tr>
		<td rowspan="4"><img src="../photos/<?php echo $execute1['gambar_kucing']; ?>" width="150px" height="150px"></td>
	</tr>
	<tr>
		<td><font face="comic" size="5" color="white">Ras Kucing</font></td>
		<td><font face="comic" size="5" color="white">:</font></td>
		<td><input class="profile" type="text" id="user" name="raskucing" value="<?php echo $execute1['ras_kucing'];?>" readonly></td>
		<td><a href="ubahdatakucing.php?idkucing=<?php echo $execute1['id_kucing']; ?>"><button class="button" type="submit" name="submit">Ubah</button></a></td>
		</tr>
	<tr>
		<td><font face="comic" size="5" color="white">Umur Kucing</font></td>
		<td><font face="comic" size="5" color="white">:</font></td>
		<td><input class="profile" type="text" id="user" name="umurkucing" value="<?php echo $execute1['umur_kucing'];?>" readonly ></td>
		<td>
		<?php 	 
		if($fetch['KC'] < 1){
		echo "<a href='hapuskucing.php?idkucing=".$execute1['id_kucing']."'><button class='button' value='Delete'>Hapus</button></a></td>";
		}else{
		echo "";
		}
		?>
		</tr>
	<tr>
		<td><font face="comic" size="5" color="white">Jenis Kelamin</font></td>
		<td><font face="comic" size="5" color="white">:</font></td>
		<td><input class="profile" type="text" id="kelaminkucing" value="<?php echo $execute1['jk_kucing'];?>" readonly></td>
		<td></td>
	</tr>		

<?php }
}
?>		
	</table>

<!--end konten-->
</body>
</html>
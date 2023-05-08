<!DOCTYPE html>
<html>
<head>
	<title>Couple</title>
	<link href="../css/admincss.css" rel="stylesheet">
</head>
<body>
<div class="header"><h1>CAT LOVERS</h1></div>
<div class="sidenav">
<div class="tulisan"> 
<img src="../gambar/user.png" width="100px" height="100px" >
  <a href="" >Profile</a>
  <a href="">Transaksi</a>
  <a href="../logout.php" >Logout</a>
</div>
</div>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="admincouple.php">Couple</a>
  <a href="adminadopt.php">Adopt</a>
  <a href="datauser.php">Data User</a>
  <a href="adminforum.php">Forum </a>
</div>
<div class="container">
<div class="row">

<!--ini tampilannya yg tabel adopt-->

<table class="table">
<?php 
session_start();
$sesi = $_SESSION['USER'];
include "../koneksi.php";
$select = "SELECT t.id_transaksi, t.id_user, t.id_kucing, k.ras_kucing, k.umur_kucing, k.jk_kucing, k.gambar_kucing
            FROM tb_transaksi t
            INNER JOIN tb_user u ON u.id_user = t.id_user
            INNER JOIN tb_kucing k ON k.id_kucing = t.id_kucing
            WHERE t.kategori = 'ADOPT'
            ORDER BY t.id_transaksi ASC";
$runselect = mysql_query($select);

while($loop = mysql_fetch_assoc($runselect)){
  echo "<tr>";
  echo "<th rowspan='3'><img src='../photos/".$loop['gambar_kucing']."' width='180px' height='180px'></th>";
  echo "<td>Ras Kucing : ".$loop['ras_kucing']."</td>";
  echo "<td></td>";
  echo "<td rowspan='3'><a href='post_detail.php?iduser=".$loop['id_user']."&idkucing=".$loop['id_kucing']."'><button class='button' type='submit' name='submit'>Detail</button></a><br>";
  echo "<a href='deleteadmin.php?id_transaksi=".$loop['id_transaksi']."'><button class='button' type='submit' name='submit'>Delete</button></a></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan='2'>Umur Kucing : ".$loop['umur_kucing']."</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td colspan='2'>Jenis Kelamin : ".$loop['jk_kucing']."</td>";
  echo "</tr>";

}
?>  
</table>
<!--ini tampilannya yg tabel couple-->
</div>      
</div>
</body>
</html>
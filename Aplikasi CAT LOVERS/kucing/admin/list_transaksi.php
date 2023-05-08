<!DOCTYPE html>
<html>
<?php 
include '../koneksi.php'; ?>
<head>
	<title>Menu Login</title>
	<link href="../css/admincss.css" rel="stylesheet">
</head>
<body>
<div class="header"><h1> CAT LOVERS</h1></div>
<div class="sidenav">
<div class="tulisan"> 
<img src="../gambar/123.jpg" width="120px" height="100px" >
  <a href="profileadmin.php">Profile
  <a href="list_transaksi.php" >Transaksi</a>
  <a href="../logout.php" >Logout</a>
</div>
</div>
<div class="topnav">
  <a href="index.php" target="_top">Home</a>
  <a href="admincouple.php">Couple</a>
  <a href="adminadopt.php">Adopt</a>
  <a href="datauser.php" target="_top">Data User</a>
  <a href="adminforum.php">Forum </a>
</div>
<div class="container">
<CENTER>
  <table id="customers" >
</CENTER> 
<?php 
$qit = "SELECT t.id_transaksi,t.id_user,t.id_kucing,t.kategori,u.username,dt.status FROM tb_transaksi t
        JOIN tb_kucing k ON t.id_kucing = k.id_kucing
        JOIN tb_detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
        JOIN tb_user u ON t.id_user = u.id_user
        WHERE dt.status = 'JODOH' or dt.status = 'SETUJU'";
$rit = mysql_query($qit);
?>
<tr>
    <th>No</th>
    <th>Jenis Post</th>
    <th>Nama Pemilik </th>
    <td>Aksi</td>
 </tr>
<?php
$no = 1;
while ($fit = mysql_fetch_array($rit)) {
  echo "<tr>";
  echo "<td>".$no++."</td>";
  echo "<td>".$fit['kategori']."</td>";
  echo "<td>".$fit['username']."</td>";
  if($fit['status'] === "JODOH"){
  echo "<td><a href='transaksicouple.php?id=".$fit['id_kucing']."&idt=".$fit['id_transaksi']."'><button class='button' type='submit' name='submit'>Lihat Detail Couple</button></a></td>";
  }else{
    echo "<td><a href='transaksiadopt.php?id=".$fit['id_kucing']."&idt=".$fit['id_transaksi']."'><button class='button' type='submit' name='submit'>Lihat Detail Adopt</button></a></td>";
  }
}
?>
</table>
</div>
</body>
</html>
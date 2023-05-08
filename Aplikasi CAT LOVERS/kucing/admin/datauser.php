<!DOCTYPE html>
<html>
<head>
	<title>Menu Login</title>
	<link href="../css/admincss.css" rel="stylesheet">
</head>
<body>
<div class="header"><h1> CAT LOVERS</h1></div>
<div class="sidenav">
<div class="tulisan"> 
<img src="../gambar/user.png" width="120px" height="100px" >
  <a href="profileadmin.php">Profile
  <a href="#about" >Transaksi</a>
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
include '../koneksi.php';
$select = "SELECT * FROM tb_user WHERE username NOT IN ('admin') ORDER BY username ASC";
$runselect = mysql_query($select);
$no = 1;
?>
<tr>
    <th>No</th>
    <th>Username</th>
    <th>Password</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Nomor HP</th>
    <th>Alamat</th>
    <th>Hapus</th>
 </tr>
<?php while($looping = mysql_fetch_array($runselect)){
 echo "<tr>";
    echo "<td>".$no++."</td>";
    echo "<td>".$looping['username']."</td>";
    echo "<td>".$looping['password']."</td>";
    echo "<td>".$looping['nama_lengkap']."</td>";
    echo "<td>".$looping['jenis_kelamin']."</td>";
    echo "<td>".$looping['nomor_hp']."</td>";
    echo "<td>".$looping['domisili']."</td>";
    echo "<td><a href='deleteuser.php?id_user=".$looping['id_user']."'><button class='button5' type='submit' name='submit'>Delete</button></a></td>";
 echo "</tr>";
}?>
</table>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<?php
include '../koneksi.php';
?>
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
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Author</th>
    <th>Tanggal</th>
    <th>Balasan</th>
    <th>Aksi</th>
</tr>

<?php
$queryselect = "SELECT f.id_forum,f.judul_forum,f.id_user,f.judul_forum,f.tanggal_forum,f.total_balasan,u.username FROM tb_forum f 
                JOIN tb_user u ON f.id_user = u.id_user
                ORDER BY f.id_forum ASC";
$runselect = mysql_query($queryselect);
$no = 1;
while($fetchselect = mysql_fetch_array($runselect)){
  echo "<tr>";
  echo "<td><a href='lihatforumadmin.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$no++."</font></a></td>";
  echo "<td><a href='lihatforumadmin.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$fetchselect['judul_forum']."</font></a></td>";
  echo "<td><a href='lihatforumadmin.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$fetchselect['username']."</font></a></td>";
  echo "<td><a href='lihatforumadmin.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$fetchselect['tanggal_forum']."</font></a></td>";
  echo "<td><a href='lihatforumadmin.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$fetchselect['total_balasan']."</font></a></td></a>";
   echo "<td><a href='deleteforum.php?id=".$fetchselect['id_forum']."'><button class='button' type='submit' name='submit'>Hapus</button></a></td>";
  echo "</tr>";
}
?>

</table>
</div>
</body>
</html>
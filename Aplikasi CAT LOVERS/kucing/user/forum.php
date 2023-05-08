<!DOCTYPE html>
<html>
<?php
include '../koneksi.php';
?>
<head>
	<title>Forum</title>
	<link href="../css/copad.css" rel="stylesheet">
</head>
<body>
	<div class="header">CAT LOVERS</div>
<div class="sidenav">
<div class="tulisan"> 
  <CENTER><img src="../gambar/user.png" width="100px" height="100px" ></CENTER>		
  <a href="profile.php" >User Control Panel</a>
  <a href="createforum.php">Buat Post</a>
  <a href="../logout.php">Logout</a>
</div>
</div>
<div class="topnav">
  <a href="index.php">Home </a>
  <a href="couple.php">Need Couple</a>
  <a href="adopt.php">Need Adopt</a>
  <a href="forum.php">Forum </a>
</div>
<div class="container">
<CENTER>
  <table id="forum" class="listthread">
</CENTER> 
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Author</th>
    <th>Tanggal</th>
    <th>Balasan</th>
</tr>
<?php
$queryselect = "SELECT f.id_forum,f.judul_forum,f.id_user,f.judul_forum,f.tanggal_forum,f.total_balasan,u.username FROM tb_forum f 
                JOIN tb_user u ON f.id_user = u.id_user
                ORDER BY f.id_forum ASC";
$runselect = mysql_query($queryselect);
$no = 1;
while($fetchselect = mysql_fetch_array($runselect)){
  echo "<tr>";
  echo "<td><a href='lihatforum.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$no++."</font></a></td>";
  echo "<td><a href='lihatforum.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$fetchselect['judul_forum']."</font></a></td>";
  echo "<td><a href='lihatforum.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$fetchselect['username']."</font></a></td>";
  echo "<td><a href='lihatforum.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$fetchselect['tanggal_forum']."</font></a></td>";
  echo "<td><a href='lihatforum.php?id=".$fetchselect['id_forum']."' style='text-decoration: none'><font color='white'>".$fetchselect['total_balasan']."</font></a></td></a>";
  echo "</tr>";
}
?>
</table>
</CENTER>
</div>
</body>
</html>
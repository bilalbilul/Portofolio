  <!DOCTYPE html>
<html>
<?php
include '../koneksi.php';
?>
<head>
	<title>Lihat Forum</title>
	<link href="../css/forum.css" rel="stylesheet">
</head>
<body>
<div class="header">CAT LOVERS</div>
<div class="sidenav">
<div class="tulisan"> 
  <CENTER><img src="../gambar/user.png" width="120px" height="100px" ></CENTER>		
  <a href="profile.php">User Control Panel</a>
  <a href="createforum.php">Buat Post</a>
  <a href="../logout.php" >Logout</a>
</div>
</div>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="couple.php">Need Couple</a>
  <a href="adopt.php">Need Adopt</a>
  <a href="forum.php">Forum </a>
</div>
<?php
$id_forum = $_GET['id'];

$queryselect = "SELECT f.id_forum,f.judul_forum,f.id_user,f.judul_forum,f.tanggal_forum,f.isi_forum,u.username FROM tb_forum f 
                JOIN tb_user u ON f.id_user = u.id_user
                WHERE f.id_forum = '$id_forum'
                ORDER BY f.id_forum ASC";
$runselect = mysql_query($queryselect);
$fetchselect = mysql_fetch_array($runselect);
?>

<center>
	<h1>Forum Diskusi</h1>
	<div class="border">
<table class="buat1" width="700px" height="200px">
<form method="POST" action="balasforum.php?id=<?php echo $id_forum ?>">
	<tr>
		<td>Author</td>
		<td>:</td>
		<td><input class="input" type="text" value="<?php echo $fetchselect['username']; ?>" readonly></td>
	</tr>
	<tr>
		<td>Judul</td>
		<td>:</td>
		<td><input class="input" type="text" value="<?php echo $fetchselect['judul_forum']; ?>" readonly></td>
	</tr>
	<tr>
		<td>Isi</td>
		<td>:</td>
		<td><textarea type="text" readonly=""><?php echo $fetchselect['isi_forum']; ?></textarea></td>
	</tr>		
	<td><input class="button2" type="submit" value="Balas"></td>
</form>

<?php 
$checkvalue = "SELECT df.id_balasan,df.id_forum,df.judul_balasan,df.isi_balasan,df.tanggal_balasan,u.username FROM tb_detail_forum df
JOIN tb_forum f ON df.id_forum = f.id_forum
JOIN tb_user u ON df.id_user = u.id_user
WHERE df.id_forum = '$id_forum'";
$runcheckvalue = mysql_query($checkvalue);
$runcheckvalue1 = mysql_query($checkvalue);
$executecheckvalue = mysql_fetch_array($runcheckvalue);
if(empty($executecheckvalue) OR $executecheckvalue === NULL){
echo "";
}else{
while($executecheckvalue1 = mysql_fetch_array($runcheckvalue1)) {
  ?>

     <table width="700x" border="0" class="buat2">
            <tr>
               <td bgcolor="black">
                  <table width="100%" border="0">
                       <tr>
                        <td width="27%" valign="top">Tanggal : <?php echo $executecheckvalue1['tanggal_balasan'] ?></td>
                        <td width="27%" valign="top"></td>
                        <td width="27%" valign="top"><div align="right"><strong><?php echo $executecheckvalue1['username'] ?></strong></div></td>
                     </tr>
                     <tr>
                        <td height="20" colspan="3" valign="top">
                           <p>
                              <a href=""></a><br />
                              <strong><em><?php echo $executecheckvalue1['judul_balasan'] ?></em></strong><br />
                           </p>
                           <hr />
                           <pre><?php echo $executecheckvalue1['isi_balasan'] ?></pre>
                        </td>
                     </tr>
                     <tr>
                        <td height="10" colspan="3" valign="top" bgcolor="black"> </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
     </table>
     <?php } } ?> 
</center>
</form>
</table>       
</div>
</body>
</html>
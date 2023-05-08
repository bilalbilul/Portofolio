<!DOCTYPE html>
<html>
<head>
	<title>Menu Post Kucing</title>
	<link href="../css/post.css" rel="stylesheet">
</head>
<body>
<table width="80%" align="center">
	<tr>
<td><h1 class="h1">Menu Post Kucing</h1></td>
<td><a href="couple.php"><button class="button2">Kembali</button></a>
</table>
<center><hr size="2" color="black" width="1000px"></hr></center>
<div class="container">
<CENTER><table id="customers">
</CENTER> 
<?php
include '../koneksi.php';
$sesi = $_SESSION['USER'];
$select = "SELECT k.gambar_kucing, k.jk_kucing, k.umur_kucing, k.ras_kucing, k.id_kucing, u.id_user
            FROM tb_kucing k
            LEFT JOIN tb_user u ON u.id_user = k.id_user 
            WHERE u.username = '$sesi'";
$runselect = mysql_query($select);
?>
<tr>
    <th>Foto</th>
    <th>Ras Kucing</th>
    <th>Umur Kucing</th>
    <th>Jenis kelamin</th>
    <th>Post for</th>
 </tr>

<?php
while($loop = mysql_fetch_array($runselect)){
    echo "<tr>";
    echo "<td><img src='../photos/".$loop['gambar_kucing']."' width='100px' height='100px'></td>";
    echo "<td>".$loop['ras_kucing']."</td>";
    echo "<td>".$loop['umur_kucing']."</td>";
    echo "<td>".$loop['jk_kucing']."</td>";
    echo "<td><a href='aksipost.php?idkucing=".$loop['id_kucing']."&iduser=".$loop['id_user']."'><button class='button2' type='submit' name='submit'>Couple</button></a><br>
    <a href='aksipost1.php?idkucing=".$loop['id_kucing']."&iduser=".$loop['id_user']."'><button class='button2' type='submit' name='submit'>Adopt</button></a></td>";
    echo "</tr>";
}
?>
</table>
</div>
</body>
</html>
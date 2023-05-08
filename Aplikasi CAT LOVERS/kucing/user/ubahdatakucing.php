<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Kucing</title>
	<link href="../css/menu.css" rel="stylesheet">
</head>
<?php
include "../koneksi.php";

$idkucing = $_GET['idkucing'];
$query = "SELECT * FROM tb_kucing WHERE id_kucing='$idkucing'";
$query1 = mysql_query($query);
$fetch = mysql_fetch_array($query1);

if(isset($_POST['save'])){
$idkucing = $_GET['idkucing'];
$raskucing = $_POST['raskucing'];
$umurkucing = $_POST['umurkucing'];
$jkkucing = $_POST['jk'];
$photo_kucing = $_FILES['photokucing']['name'];
$tmp_file = $_FILES['photokucing']['tmp_name'];
$lokasi = "../photos/".$photo_kucing;

$update = "UPDATE tb_kucing SET ras_kucing='$raskucing', umur_kucing='$umurkucing', jk_kucing='$jkkucing', gambar_kucing='$photo_kucing' WHERE id_kucing='$idkucing'";
$run = mysql_query($update);

if($run){
move_uploaded_file($tmp_file, $lokasi);
echo '<script language="javascript">';
	echo 'alert("Berhasil disunting!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}else{
echo '<script language="javascript">';
	echo 'alert("Gagal disunting!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}

}

?>
<body>

<table>
	<table width="80%" border="0">
		<tr>
<td ><h1>Ubah Data Kucing</h1></td>
<td align="right" width="10%"><a href="profile.php"><button class="button" value="Tambah">Back</button></a></td>
	</tr>
</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<div class="container">
<center><img src="../photos/<?php echo $fetch['gambar_kucing']; ?>" width="200px" height="200ox"/></center>
<form method="POST" enctype="multipart/form-data">
<div class="table4">
<table>
	<tr>
		<td>Ras Kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" id="user" name="raskucing" value="<?php echo $fetch['ras_kucing'];?>"></td>
		</tr>
	<tr>
		<td>Umur Kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" id="user" name="umurkucing" value="<?php echo $fetch['umur_kucing'];?>"></td>
		</tr>	
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><input type="radio" id="jantan"  name="jk" value="Jantan">Jantan</input>
			<input type="radio" id="betina"  name="jk" value="Betina">Betina</input></td>
	</tr>
	<tr>
		<td>Photo Kucing</td>
		<td>:</td>
		<td><input type="file" name="photokucing"/></td>
	</tr>			
</table>
</div>
</div>
<div class="simbol">	
<input type="submit" name="save" class="button" value="Simpan"/>
</div>
</form>
</body>
</html>
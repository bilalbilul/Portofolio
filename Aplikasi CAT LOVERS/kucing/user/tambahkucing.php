<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kucing</title>
	<link href="../css/menu.css" rel="stylesheet">
</head>
<?php
include '../koneksi.php';

if(isset($_POST['tambah'])){
$id_user = $_GET['id'];
$raskucing = $_POST['raskucing'];
$umurkucing = $_POST['umurkucing'];
$jeniskelamin = $_POST['jk'];
$photo_kucing = $_FILES['photokucing']['name'];
$tmp_file = $_FILES['photokucing']['tmp_name'];
$lokasi = "../photos/".$photo_kucing;

$insert = "INSERT INTO tb_kucing (id_kucing,id_user,ras_kucing,umur_kucing,jk_kucing,gambar_kucing) VALUES ('','$id_user','$raskucing','$umurkucing','$jeniskelamin','$photo_kucing')";
$execute = mysql_query($insert);

if($execute){
	move_uploaded_file($tmp_file, $lokasi);
	echo '<script language="javascript">';
	echo 'alert("Berhasil ditambah!")';
	echo '</script>';
	echo '<script language="javascript">document.location="kucingsaya.php";</script>';
}else{
	echo "error".mysql_error();
}
}
?>

<body>
	<table width="80%" border="0">
		<tr>
<td ><h1>Tambah Kucing</h1></td>
<td align="right" width="10%"><a href="profile.php"><button class="button" value="Tambah">Kembali</button></a></td>
	</tr>
</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<form method="POST"  enctype="multipart/form-data">
<div class="table4">
<div class="container">	
	<table>
	<tr>
		<td>Ras Kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" name="raskucing"></td>
	</tr>
	<tr>
		<td>Umur Kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" name="umurkucing"></td>
	</tr>	
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><input type="radio" id="jantan" name="jk" value="Jantan">Jantan</input>
			<input type="radio" id="betina" name="jk" value="Betina">Betina</input></td>
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
<input type="submit" class="button" name="tambah" value="Tambah"></input>
</form>
</div>
</body>
</html>
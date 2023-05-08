<!DOCTYPE html>
<html>
<head>
	<title>Ubah data</title>
	<link href="../css/menu.css" rel="stylesheet">
</head>
<body>
	<table width="80%" border="0">
		<tr>
<td ><h1>Ubah Data</h1></td>
<td align="right" width="10%"><a href="profile.php"><button class="button" value="Tambah">Kembali</button></a></td>
	</tr>
</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<?php
include ('../koneksi.php');
$sesion = $_SESSION['USER'];
$query = "SELECT * FROM tb_user WHERE username='$sesion'";
$quer1 = mysql_query($query);
$fetch = mysql_fetch_array($quer1);

if(isset($_POST['save'])){
$username = $_POST['user'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];

$update = "UPDATE tb_user SET username='$username', nama_lengkap='$nama', jenis_kelamin='$jk', nomor_hp='$nohp', domisili='$alamat' WHERE username='$sesion'";
$update1 = mysql_query($update);

if($update1){
	echo '<script language="javascript">';
	echo 'alert("Data berhasil diupdate!")';
	echo '</script>';
	echo '<script language="javascript">document.location="profile.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Data gagal diupdate!")';
	echo '</script>';
	echo '<script language="javascript">document.location="ubahdata.php";</script>';
}
}

?>
<form method="POST">
<div class="table4">
<div class="container">	<table>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><input class="profile" type="text" id="user" name="user" value="<?php echo $fetch['username']; ?>" readonly></td>
		</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><input class="profile" type="text" id="nama" name="nama" value="<?php echo $fetch['nama_lengkap']; ?>"></td>
		</tr>	
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><input class="input" type="radio" id="Laki-Laki" name="jk" value="Pria">Pria</input><input class="input" type="radio" id="Laki-Laki" name="jk" value="Wanita">Wanita</input></td>
		</tr>
	<tr>
		<td>No.Hp</td>
		<td>:</td>
		<td><input class="profile" type="text" id="nohp" name="nohp" value="<?php echo $fetch['nomor_hp']; ?>"></td>
		</tr>	
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><input class="profile" type="text" id="alamat" name="alamat" value="<?php echo $fetch['domisili']; ?>"></td>
		</tr>				
		
</table>
</div>	
</div>
<div class="simbol">
<input type="submit" class="button" name="save" value="Simpan"></input>
</div>
</form>
</body>
</html>
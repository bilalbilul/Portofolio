<!DOCTYPE html>
<html>
<head>
	<title>Cat Lovers</title>
	<link href="css/tampilan.css" rel="stylesheet">
</head>
<?php 
include 'koneksi.php';

if (isset($_POST['daftar'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$namalengkap = $_POST['nama'];
$nohp = $_POST['nohp'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];

$queryinsert = "INSERT INTO tb_user (id_user,username,password,nama_lengkap,jenis_kelamin,nomor_hp,domisili,level) VALUES ('','$username','$password','$namalengkap','$jk','$nohp','$alamat','1')";
$insert = mysql_query($queryinsert);

if($insert){
	echo '<script language="javascript">';
	echo 'alert("Berhasil Mendaftar!")';
	echo '</script>';
	echo '<script language="javascript">document.location="index.php";</script>';
}else{
	echo '<script language="javascript">';
	echo 'alert("Gagal Mendaftar!")';
	echo '</script>';
	echo '<script language="javascript">document.location="register.php";</script>';
}
}
?>
<div align ="center">
<body>
<div class="judul"><h1>REGISTER</h1></div>
<div class="isi"> <table>
<form action="register.php" method="POST">
<tr>
<td>Username</td> 
<td>:</td>
<td><input class="input" type="text" id="username" name="username" placeholder="Masukan username" required/></td>
</tr>
<tr>
<td>Password</td> 
<td>:</td>
<td><input class="input" type="password" id="password" name="password" placeholder="Masukan Password" required/></td>
</tr> 
<tr>
<td>Nama Lengkap</td> 
<td>:</td>
<td><input class="input" type="text" id="nama" name="nama" placeholder="Masukan Nama Lengkap" required/></td>
</tr>	
<tr>
<td>No.Hp</td> 
<td>:</td>
<td><input class="input" type="number" id="no.hp" name="nohp" placeholder="Masukan No.Hp" required/></td>
</tr>  
<tr>
<td>Jenis Kelamin</td> 
<td>:</td>
<td><input class="input" type="radio" id="Laki-Laki" name="jk" value="Pria" required>Laki-Laki</input>
	<input class="input" type="radio" id="Perempuan" name="jk" value="Wanita" required>Perempuan</input></td>
</tr> 
<tr>
<td>Alamat</td> 
<td>:</td>
<td><textarea class="input" rows='1' placeholder='Masukan Alamat' name="alamat" required></textarea></td>
</table>
<input type="submit" class="button" type="submit" name="daftar" value="Daftar"/>
</form> 
<a href="index.php"><button class="button" type="submit" value="Register">Cancel</button></a>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Post Detail Adopt</title>
	<link href="../css/menu.css" rel="stylesheet">
</head>
<body>
<table width="80%" border="0">
		<tr>
<td ><h1>Post Detail Adopt</h1></td>
<td align="right" width="10%"><a href="adopt.php"><button class="button" value="Tambah">Back</button></a></td>
	</tr>
</table>
<center><hr size="2" color="black" width="1000px" ></hr></center>
<div class="container">
<center><img  class="gambar" src="../photos/<?php echo $loop['gambar_kucing'];?>" width="150px" height="150px"></center>
<div class="table">
	<table>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><input class="profile" type="text" id="namapemilik" name="namapemilik" ></td>
		</tr>	
	<tr>
		<td>No.Hp</td>
		<td>:</td>
		<td><input class="profile" type="text" id="hp" name="hp" ></td>
		</tr>	
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><input class="profile" type="text" id="alamat" name="alamat" ></td>
		</tr>
	<tr>
		<td>Ras kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" id="ras" name="ras" ></td>
		</tr>	
	<tr>
		<td>Umur Kucing</td>
		<td>:</td>
		<td><input class="profile" type="text" id="umur" name="umur"></td>
		</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><input class="profile" type="text" id="kelamin" name="kelamin" ></td>
		</tr>		
</div>			
</table>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Cat Lovers</title>
	<link href="css/tampilan.css" rel="stylesheet">
</head>
<div align ="center">
<body>
<div class="judul"> <h1>CAT LOVERS </h1></div>
<div class ="menu">Login/Register </div>
<div class="isi"> <table>
<form action="proses_login.php" method="POST">
<tr>
<td>Username</td> 
<td>:</td>
<td><input class="input" type="text" id="username" name="username" placeholder="Masukan username" /></td>
</tr>
<tr>
<td>Password</td> 
<td>:</td>
<td><input class="input" type="password" id="password" name="password" placeholder="Masukan Password" /></td>
</tr> 
</table>
<input type="submit" class="button" name="login" value="Login"></input>
</form> 
<a href="Register.php"><button class="button">Register</button></a>
</div>
</body>
</html>
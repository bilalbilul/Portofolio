<?php
include('koneksi.php');
//MEMBUAT SESSION SESUAI ROLE
if(isset($_POST['login'])){
	$user = mysql_real_escape_string(htmlentities($_POST['username']));
	$pass = mysql_real_escape_string(htmlentities($_POST['password']));
 
	$sql = mysql_query("SELECT * FROM tb_user WHERE username='$user' AND password='$pass'") or die(mysql_error());
	if(mysql_num_rows($sql) == 0){
		echo '<script language="javascript">';
		echo 'alert("User Tidak Ditemukan")';
		echo '</script>';
		echo '<script language="javascript">document.location="index.php";</script>';
	}else{
		$row = mysql_fetch_assoc($sql);
		if($row['level'] == "0"){
			$_SESSION['ADMIN']=$user;
			echo '<script language="javascript">document.location="admin/index.php";</script>';
		}else if($row['level'] == "1"){
			$_SESSION['USER']=$user;
			echo '<script language="javascript">document.location="user/index.php";</script>';
		}else{
			echo '<script language="javascript">document.location="index.php";</script>';
		}
	}
}

//CEK SESSION USER
	if(isset($_SESSION['ADMIN'])) {
		session_start();
     	echo '<script language="javascript">document.location="admin/index.php";</script>';
     	exit;
     }else if(isset($_SESSION['USER'])){
     	session_start();
     	echo '<script language="javascript">document.location="fo/index.php";</script>';
     	exit;
     }
?>
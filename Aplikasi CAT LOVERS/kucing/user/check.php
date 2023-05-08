<?php
session_start();
 
if(!isset($_SESSION['USER'])){
	echo '<script language="javascript">alert("AKSES DITOLAK"); document.location="../index.php";</script>';
}
?>
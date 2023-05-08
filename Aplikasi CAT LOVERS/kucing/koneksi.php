<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $koneksi = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("dbkucing");
?>
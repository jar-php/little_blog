<?php 
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_DATA = 'blog';

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATA);
if(!$con){
	echo mysqli_connect_error();
}


 ?>

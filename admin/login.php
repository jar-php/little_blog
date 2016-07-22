<?php 
require_once '../include/config.inc.php';
require_once '../include/libs.inc.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['login'])) $l = $_POST['login'];
	if(isset($_POST['pass'])) $p = $_POST['pass'];

	if(login($l, $p)){
		//ввойти в админку
		//создать сессию
		session_start();
		$_SESSION['admin'] = 'login';
		header("Location: index.php");
	}else{
		echo " Ошибка входа";
	}
}
 ?>

 <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
 	<p>
 		<label>Введите логин</label><br>
 		<input type="text" name="login"></input>
 	</p>
 	<p>
 		<label>Введите пароль</label><br>
 		<input type="password" name="pass"></input>
 	</p>
 	<input type="submit" value="Отправить"></input>
 </form>
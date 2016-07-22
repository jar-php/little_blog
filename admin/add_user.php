<?php 
require_once '../include/config.inc.php';
require_once '../include/libs.inc.php';
require_once 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['login'])) $l = $_POST['login'];
	if(isset($_POST['pass'])) $p = $_POST['pass'];

	if(empty($l) or empty($p)){
		echo "Введите логин и пароль";
	}else{
		if(!addUser($l, $p)){
		echo "Пользователь существует!";
		}
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

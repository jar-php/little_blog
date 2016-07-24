<?php 
require_once 'include/config.inc.php';
require_once 'include/libs.inc.php';
 ?>
 <?php 



if(!addVisit($id)) echo "Ошибка к-ва просмотров!";

 $p = viewPost($id);
 ?>
<div class="post">
				<p id="title"><?= $p['title'] ?></p>
				<p id="date"><?= date('M d, Y', $p['datetime']) ?></p>
				<p id="date">Количество просмотров: <b><?= $p['visits'] ?></b></p>
				<p id="short">
		 <?= $p['full']?>
				</p>
				<br><br>
			</div>
 
<hr>
<h4>Есть что сказать?</h4>
<br>
<?php 
	if(isset($_POST['text'])) $t = $_POST['text'];
	if(isset($_POST['author'])) $a = $_POST['author'];

	if(!empty($t) and !empty($a)){
			if(addComment($id, $t, $a)){
				    header("Location: ".$_SERVER["REQUEST_URI"]);
				    exit;
			}else{
				echo "Ошибка отправки комментария";
			}
	}else{
		echo "Заполните все поля";
	}
 ?>
<form action="<?= $_SERVER['REQUEST_URI']?>" method="POST">
<p>
	<label>Автор</label><br>
	<input type="text" name="author"></input></p>
<p>
	<label>Коментарий</label><br>
	<textarea name="text"></textarea>
</p>
<input type="hidden" name="pid" value="$pid"></input>
<input type="submit" value="Отправить"></input>
</form>

<h4>Коментарии</h4>
<?php 
	$comms = getAllComments($id);
	if(count($comms) == 0){
		echo "Пока что нет коментариев!";
		exit;
	}
	foreach($comms as $comm){
 ?>
 <p id="comment">
 	<a href="user.php?name=<?= $comm['author']?>"><?= $comm['author'] ?></a><br>
 	<?= $comm['text'] ?>
 </p>
 <?php 
}



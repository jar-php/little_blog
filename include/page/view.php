<?php 
require_once 'include/config.inc.php';
require_once 'include/libs.inc.php';
 ?>
 <?php 
//Незабыть отфильтровать данные GET

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
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
<p>
	<label>Автор</label><br>
	<input type="text" name="author"></input></p>
<p>
	<label>Коментарий</label><br>
	<textarea name="text"></textarea>
</p>
<input type="hidden" name="$id"></input>
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
 <p>
 	<a href="user.php?name=<?= $comm['author']?>"><?= $comm['author'] ?></a><br>
 	<?= $comm['text'] ?>
 </p>
 <?php 
}



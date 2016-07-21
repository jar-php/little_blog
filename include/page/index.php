<?php 
require_once 'include/config.inc.php';
require_once 'include/libs.inc.php';
 ?>
<?php 
	$post = getAllPosts();
	//print_r($post);
	foreach($post as $p){
 ?>
	<div class="post">
				<p id="title"><?= $p['title'] ?></p>
				<p id="date"><?= date('M d, Y', $p['datetime']) ?></p>
				<p id="short">
			<?= $p['short']?>
				</p>
				<a id="more" href="?page=view&id=<?=$p['id']?>">Подробнее</a>
			</div>
 <?php 
}
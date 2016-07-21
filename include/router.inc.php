<?php 
const PAGE_PATH = 'include/page/';
	if(isset($_GET['page'])) $page = $_GET['page'];
	if(isset($_GET['id'])) $id = $_GET['id'];
	switch ($page) {
		case 'index':
			include_once PAGE_PATH . "index.php";
			break;
		case 'about':
			include_once PAGE_PATH . "about.php";
			break;
		case 'contacts':
			include_once PAGE_PATH . "contacts.php";
			break;
		case 'view':
			if(!empty($id)){
			include_once PAGE_PATH . "view.php";
			} 
		break;
		default:
			include_once PAGE_PATH . "index.php";
			break;
	}
 ?>
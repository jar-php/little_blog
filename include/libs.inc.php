<?php 
//helpers
function result2Arr($data){
	$arr = [];
	while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)){
		$arr[] = $row;
	}
	return $arr;
}
function clearStr(){

}

function clearInt(){

}
//Helper
function existLogin($login){
	global $con;
	$sql = "SELECT login FROM users WHERE login = '$login'";
	$res = mysqli_query($con, $sql);
	if(!$res){
		echo mysqli_error($con);
	}
	return mysqli_num_rows($res);
}

function getHash($login){
	global $con;
	$sql = "SELECT pass FROM users WHERE login = '$login'";
	$res = mysqli_query($con, $sql);
	if(!$res){
		echo mysqli_error($con);
	}
	return mysqli_fetch_array($res, MYSQLI_ASSOC);
}

function addUser($login, $pass){
	global $con;
	$hash = password_hash($pass, PASSWORD_BCRYPT);
	if(!existLogin($login)){
		$sql = "INSERT INTO users (login, pass) VALUES ('$login', '$hash')";
		$res = mysqli_query($con, $sql);
		if(!$res){
			echo mysqli_error($con);
		}
	}else{
		return false;
	}
	return $res;
}

function login($login, $pass){
	if(existLogin($login)){
		$hash = getHash($login);
	}else{
		echo "Нет логина";
	}
	return password_verify($pass, $hash['pass']);
}
/*
@param return array of posts 
*/
function getAllPosts(){
	global $con;
	$sql = "SELECT * FROM posts ORDER BY id DESC";
	$result = mysqli_query($con, $sql);
	mysqli_close($con);
	if(!$result){
		echo mysqli_error();
	}
	return result2Arr($result);
}

/*
@param $id ident. of curent if
@param return row with post
*/
function viewPost($id){
	global $con;
	$sql = "SELECT * FROM posts WHERE id = $id";
	$result = mysqli_query($con, $sql);
	if(!$result){
		echo mysqli_error();
	}
	return mysqli_fetch_array($result);
}	

/*
@param return true/false
*/
 function addNewPost($title, $short, $full, $author){
 	//insert DateTime;
 	global $con;
 	try{
 	$dt = time();
 	$sql = "INSERT INTO posts(title, short, full, author, datetime) VALUES (?, ?, ?, ?, ?)";
 	$stmt = mysqli_prepare($con, $sql);
 	if(!$stmt){
 		throw new Exception("Ошибка запроса к БД");
 	}
 	mysqli_stmt_bind_param($stmt, 'ssssi', $title, $short, $full, $author, $dt);
 	$res = mysqli_stmt_execute($stmt);
 	mysqli_stmt_close($stmt);
 	}catch(Exception $e){
 		echo $e->getMessage();
 	}
 	return $res;
 }

 /*
	@param $id - post id to delete
	@param return - true/false
 */
function deletePost($id){
	global $con;
	$sql = "DELETE FROM posts WHERE id = $id";
	$result = mysqli_query($con, $sql);
	if(!$result){
		echo mysqli_error($con);
	}
	return $result;
}
/*
	@param $pid = post ID
	@param return true/false
*/
/*
	@param return array of comments
*/
function getAllComments($pid){
	global $con;
	$sql = "SELECT * FROM comments WHERE pid = $pid ORDER BY id DESC";
	$result = mysqli_query($con, $sql);
	if(!$result){
		echo mysqli_error();
	}
	return result2Arr($result);
}
function addComment($pid, $text, $author){

}


/*
@param $pid post ID
@param return int count 
*/
function getVisits($pid){
	global $con;
	$sql = "SELECT count FROM visits WHERE pid = $pid";
	if(!$res = mysqli_query($con, $sql)){
		echo mysqli_error($con);
	}

	return $row = mysqli_fetch_assoc($res);
}	

/*


*/
function addVisit($pid){
	global $con;
	$sql = "UPDATE visits SET count = count + 1 WHERE pid = $pid";
	$res = mysqli_query($con, $sql);
	if(!$res){
		echo mysqli_error();
	}

	return mysqli_num_rows($con);
}


 ?>



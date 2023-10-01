<?
$configs = include('config.php');
$mysqli = new mysqli($configs['host'], $configs['username'], $configs['password'], $configs['db']);

$sql = $mysqli->prepare("INSERT INTO comments(datetime, text) VALUES (?, ?)");
$sql->bind_param("ss", $current_datetime, $comment_text);
$message = '';
if (isset($_POST['send_btn'])) {
	$current_datetime = date("Y-m-d H:i:s");
	$comment_text = htmlspecialchars($_POST["comment"]);
	if (!$sql->execute()) {
		$message = 'Комментарий не был отправлен: '.$mysqli->error;
	}
	header("Location: /");
	exit();
}

$all_comments = $mysqli->query("SELECT datetime, text FROM comments ORDER BY datetime DESC");
?>
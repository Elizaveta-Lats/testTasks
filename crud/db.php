<?
$mysqli = new mysqli("localhost", "comment_user", "pC6g3EoSeORHhpGQDXzQ", "commentsdb"); // права пользователя - SELECT и INSERT
$all_comments = $mysqli->query("SELECT datetime, text FROM comments");


$sql = $mysqli->prepare("INSERT INTO comments(datetime, text) VALUES (?, ?)");
$sql -> bind_param("ss", $current_datetime, $comment_text);


if (isset($_POST['send_btn'])) {
	$current_datetime = date("Y-m-d H:i:s");
	$comment_text = $_POST["comment"];
	$sql -> execute();
	header("Refresh:0");
}

?>
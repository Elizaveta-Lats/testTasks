<!doctype html>
<html lang="ru">
	<head>
	  <meta charset="utf-8" />
	  <title>Комментарии</title>
	  <link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<? require 'db.php'; ?>
		<img src="meme.jpg" width="500" alt="meme">
		<h3>Комментарии</h3>
		<form action="" method="post">
			<p><b>Оставьте свой комментарий:</b></p>
			<p><textarea rows="5" cols="30" name="comment"></textarea></p>
			<p><input type="submit" value="Отправить" name="send_btn"></p>
		</form>
		<p><i><? echo $message; ?></i></p>
		<table>
			<tbody>
				<? foreach ($all_comments as $one_comment): ?>
				<tr>
					<td class="datetime"><? echo $one_comment['datetime']; ?></td>
					<td><? echo $one_comment['text']; ?></td>
				</tr>
				<? endforeach; ?>
			</tbody>
		</table>		
	</body>
</html>
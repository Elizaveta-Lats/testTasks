<!doctype html>
<html lang="ru">
	<head>
	  <meta charset="utf-8" />
	  <title>Комментарии</title>
	  <link rel="stylesheet" href="style/style.css" />
	</head>
	<body>
		<? require 'db.php'; ?>
		<h3>Комментарии</h3>
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

		<form action="" method="post">
			<p><b>Оставьте свой комментарий:</b></p>
			<p><textarea rows="5" cols="30" name="comment"></textarea></p>
			<p><input type="submit" value="Отправить" name="send_btn"></p>
		</form>
	</body>
</html>
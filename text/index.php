<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8" />
		<title>Текст</title>
	</head>
	<body>
		<? 
			include "text.php";
			echo $dom->saveHTML();
		?>
	</body>
</html>
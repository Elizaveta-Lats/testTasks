<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8" />
		<title>Текст</title>
	</head>
	<body>
		<? include "text.php"; ?>
		<?
			foreach($final_text as $word) { // вывод обрезанного текста
				echo $word, " ";
			}
			echo "...";
		?>
	</body>
</html>
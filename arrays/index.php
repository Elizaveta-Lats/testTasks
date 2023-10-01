<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8" />
		<title>Таблица с баллами</title>
		<link rel="stylesheet" href="style/style.css" />
	</head>
	<body>
		<? include 'code.php'; ?>
		<table>
			<tr>
				<td></td>
				<? foreach ($subject_array as $subject): ?>
				<td> <? echo $subject; ?> </td>
				<? endforeach; ?>
			</tr>
			<? foreach ($table_data as $surname=>$array): ?>
			<tr>
				<td> <? echo $surname; ?> </td>
				<? foreach ($subject_array as $subject): ?>
				<td> 
					<? 
					if (array_key_exists($subject, $array)):
						echo $array[$subject];
					endif;
					?> 
				</td>
				<? endforeach; ?>
			</tr>
			<? endforeach; ?>
		</table>
	</body>
</html>
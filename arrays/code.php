<?
$data = [
	['Иванов', 'Математика', 5],
	['Иванов', 'Математика', 4],
	['Иванов', 'Математика', 5],
	['Петров', 'Математика', 5],
	['Сидоров', 'Физика', 4],
	['Иванов', 'Физика', 4],
	['Петров', 'ОБЖ', 4],
];

$subject_array = [];
foreach($data as $row) { // сначала нужно создать все ключи, иначе будут ворнинги
	$table_data[$row[0]][$row[1]] = 0;
	$subject_array[] = $row[1];
}

foreach($data as $row) {
	$table_data[$row[0]][$row[1]] += $row[2];
}

$subject_array = array_unique($subject_array);
asort($subject_array);

ksort($table_data);

?>
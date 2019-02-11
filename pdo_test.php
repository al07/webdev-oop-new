<?php


$table_name = "test_pdo";
$db = new PDO('mysql:host=localhost;dbname=pdo_test', 'root', '');

echo "Ok!";

$sql = "SELECT * FROM ".$table_name;

?>
<h2>Вывод данных.</h2>
<?php 
	$result = $db->query($sql);
	echo "<ul>";
	while( $cur_line = $result->fetch(PDO::FETCH_ASSOC) ) {
		echo "<li>{$cur_line['name']}</li>";
	}
	echo "</ul>";
?>


<h2>Вывод данных. Через fetchAll</h2>
<?php 
	$result = $db->query($sql);
	$data = $result->fetchAll(PDO::FETCH_ASSOC);
	echo "<ul>";
	foreach( $data as $cur_line ) {
		echo "<li>{$cur_line['name']}</li>";
	}
	echo "</ul>";
?>


<h2>Вывод данных. Автоматическая защита</h2>
<?php 
	$sql = "SELECT * FROM ".$table_name . " WHERE name=:name";
	
	$username = "Строка 1";

	$stmt = $db->prepare($sql);
	$stmt-> bindColumn('name', $cur_name);
	$stmt->execute(
		array(
			":name" => $username
		)
	);

	
	
	echo "<ul>";
	while( $stmt->fetch() ) {
		echo "<li>{$cur_name}</li>";
	}
	echo "</ul><br><br><br>";
	
?>

<h2>Добавление данных. Автоматическая защита</h2>
<?php
	$insert_string = "Был тихий серый вечер";
	$sql = "INSERT INTO ".$table_name." (name) VALUES (:name)";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':name', $insert_string);
	$stmt->execute();
	echo "Последняя вставленная запись, номер ".$db->lastInsertId();
?>
<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$sqlQuery = "
	SELECT
		id_cartola,
		name,
		team,
		shield,
		pro,
		first_year
	FROM members
	ORDER BY name
";

$result = $conn->prepare($sqlQuery);

if($result->execute()) {
	$data = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$row['name'] = utf8_encode($row['name']);
		$row['team'] = utf8_encode($row['team']);
		array_push($data, $row);
	}
	echo json_encode($data);
}
else {
	echo json_encode(
		array(
			"status" => 0,
			"message" => "Falha ao executar a operação."
		)
	);
}

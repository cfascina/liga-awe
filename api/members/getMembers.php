<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$sqlQuery = "
	SELECT
		id,
		name,
		team,
		shield,
		pro
	FROM members
	ORDER BY team
";

$result = $conn->prepare($sqlQuery);

if($result->execute()) {
	$data = array();
	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
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

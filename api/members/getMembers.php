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
	$dataArr = array();
	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		array_push($dataArr, $row);
	}
	echo json_encode($dataArr);
}
else {
	echo json_encode(
		array(
			"status" => 0,
			"message" => "Falha ao executar a operação."
		)
	);
}

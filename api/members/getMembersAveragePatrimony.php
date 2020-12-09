<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$sqlQuery = "
    SELECT TRUNCATE(AVG(patrimony), 2) as average 
    FROM rounds
";

$result = $conn->prepare($sqlQuery);

if($result->execute()) {
	echo json_encode($result->fetch(PDO::FETCH_ASSOC));
}
else {
	echo json_encode(
		array(
			"status" => 0,
			"message" => "Falha ao executar a operação."
		)
	);
}

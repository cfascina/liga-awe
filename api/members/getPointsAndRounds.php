<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$memberId = isset($_GET['memberId']) ? $_GET['memberId'] : die(); 

$sqlQuery = "
	SELECT 
		SUM(points) AS points, 
		COUNT(id_round) AS rounds
	FROM rounds 
    WHERE id_member = ?
";

$result = $conn->prepare($sqlQuery);

$result->bindParam(1, $memberId);

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

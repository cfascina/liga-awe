<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$memberId = isset($_GET['memberId']) ? $_GET['memberId'] : die(); 

$sqlQuery = "
    SELECT COUNT(R.id_member) AS times
    FROM rounds R 
    INNER JOIN (
        SELECT 
            id_round, 
            MIN(points) AS last_points
        FROM rounds 
        GROUP BY id_round
    ) RL ON
        R.id_round = RL.id_round AND
        R.points = RL.last_points
    WHERE R.id_member = ?
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

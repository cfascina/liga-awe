<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$roundId = isset($_GET['roundId']) ? $_GET['roundId'] : die(); 

$sqlQuery = "
    SELECT 
        R.id_round, 
        M.shield,
        M.team,
        M.name,
        R.points,
        R.total AS total_round,
        (
            SELECT SUM(points) 
            FROM rounds 
            WHERE id_member = M.id_cartola
        ) AS total_championship
    FROM rounds R
    INNER JOIN members M ON
        M.id_cartola = R.id_member
    WHERE R.id_round = ?
    ORDER BY R.points DESC
";

$result = $conn->prepare($sqlQuery);

$result->bindParam(1, $roundId);

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

<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$sqlQuery = "
    SELECT
        M.team,
        M.name,
        MIN(points) AS points,
        R.id_round
    FROM rounds R
    INNER JOIN members M ON
        M.id_cartola = R.id_member
    GROUP BY 
        R.id_member,
        R.id_round
    ORDER BY points
    LIMIT 1
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

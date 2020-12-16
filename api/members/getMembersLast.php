<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$sqlQuery = "
    SELECT 
        R.id_member,
        M.team, 
        M.shield, 
        M.pro,
        R.total,
        R.id_round
    FROM rounds R 
    INNER JOIN members M ON
        M.id_cartola = R.id_member
    WHERE R.id_round = (SELECT MAX(id_round) FROM rounds)
    ORDER BY R.total
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

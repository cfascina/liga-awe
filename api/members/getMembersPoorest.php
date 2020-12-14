<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$sqlQuery = "
    SELECT
        M.id_cartola,
        M.shield,
        M.team,
        M.pro,
        R.patrimony
    FROM rounds R 
    INNER JOIN members M ON
	    M.id_cartola = R.id_member
    WHERE R.id_round = (SELECT MAX(id_round) FROM rounds) 
    ORDER BY patrimony  
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

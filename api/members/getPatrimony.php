<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$memberId = isset($_GET['memberId']) ? $_GET['memberId'] : die(); 

$sqlQuery01 = "
	SELECT 
		TRUNCATE(AVG(points), 2) as average
    FROM rounds 
    WHERE id_member = ?;
";

$sqlQuery02 = "
    SELECT patrimony
    FROM rounds
    WHERE id_member = ?
    ORDER BY id_round DESC LIMIT 1
";

$result01 = $conn->prepare($sqlQuery01);
$result02 = $conn->prepare($sqlQuery02);

$result01->bindParam(1, $memberId);
$result02->bindParam(1, $memberId);

if($result01->execute() && $result02->execute()) {
	$data = array();
	
	array_push($data, [
		'points' => $result01->fetch(PDO::FETCH_ASSOC)['points'],
		'rounds' => $result01->fetch(PDO::FETCH_ASSOC)['points'],
	]);
	// array_push($data, ['rounds' => $result01->fetch(PDO::FETCH_NUM)[1]]);
	// array_push($data, ['average' => $result01->fetch(PDO::FETCH_NUM)[2]]);
	// array_push($data, ['patrimony' => $result02->fetch(PDO::FETCH_NUM)['points']]);
	// array_push($data, $result02->fetch(PDO::FETCH_OBJ));
	
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

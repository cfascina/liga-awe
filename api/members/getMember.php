<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include '../../config/database.php';

$id = isset($_GET['id']) ? $_GET['id'] : die(); 

$sqlQuery = "
	SELECT *
	FROM members
	WHERE id_cartola = ?
";

$result = $conn->prepare($sqlQuery);

$result->bindParam(1, $id);

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

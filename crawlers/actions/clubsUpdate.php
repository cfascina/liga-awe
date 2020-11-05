<?php

require_once '../../config/database.php';
require_once '../getData.php';

function updateClub($clubData) {
	global $conn;

	$sqlQuery = "
        UPDATE clubs
		SET
			name = :name,
			abbreviation = :abbreviation,
			shield = :shield
		WHERE
			id_cartola = :cartolaId
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':cartolaId', $clubData['cartolaId']);
	$result->bindParam(':name', $clubData['name']);
	$result->bindParam(':abbreviation', $clubData['abbreviation']);
	$result->bindParam(':shield', $clubData['shield']);
	
	try {
		$result->execute();
		echo 'Clube ' . $clubData['name'] . ' alterado com sucesso.<br>';
	}
	catch(Exception $e) {
		echo 'Falha ao alterar o clube ' . $clubData['name'] . '.<br>';
		// echo $e->getMessage();
	}
}

$clubsData = getClubsData();

foreach($clubsData as $clubData) {
    updateClub($clubData);
};


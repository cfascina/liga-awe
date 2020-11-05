<?php

require_once '../../config/database.php';
require_once '../getData.php';

function addClub($clubData) {
	global $conn;

	$sqlQuery = "
		INSERT INTO clubs
        VALUES (
            DEFAULT,
            :cartolaId,
			:name,
			:abbreviation,
			:shield
        )
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':cartolaId', $clubData['cartolaId']);
	$result->bindParam(':name', $clubData['name']);
	$result->bindParam(':abbreviation', $clubData['abbreviation']);
	$result->bindParam(':shield', $clubData['shield']);
	
	try {
		$result->execute();
		echo 'Clube ' . $clubData['name'] . ' cadastrado com sucesso.<br>';
	}
	catch(Exception $e) {
		echo 'Falha ao cadastrar o clube ' . $clubData['name'] . '.<br>';
		// echo $e->getMessage();
	}
}

$clubsData = getClubsData();

foreach($clubsData as $clubData) {
    addClub($clubData);
};


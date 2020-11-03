<?php

require_once '../../config/database.php';
require_once '../baseFunctions.php';

function addTeam($teamData) {
	global $conn;

	$sqlQuery = "
		INSERT INTO teams
        VALUES (
            DEFAULT,
            :teamId,
			:isPro,
			:avatar,
			:playerName,
			:teamName,
			:shirtImage,
			:shieldImage,
            :firstYear
        ) 
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':teamId', $teamData['teamId']);
	$result->bindParam(':isPro', $teamData['isPro']);
	$result->bindParam(':avatar', $teamData['avatar']);
	$result->bindParam(':playerName', $teamData['playerName']);
	$result->bindParam(':teamName', $teamData['teamName']);
	$result->bindParam(':shirtImage', $teamData['shirtImage']);
	$result->bindParam(':shieldImage', $teamData['shieldImage']);
	$result->bindParam(':firstYear', $teamData['firstYear']);
	
	try {
		$result->execute();
	}
	catch(Exception $e) {
		echo 'Falha ao executar a operação:<br>' . $e->getMessage();
	}
}

$teamsIds = file('../idTeams.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach($teamsIds as $teamId) {
    $teamData = getTeamData($teamId);
    addTeam($teamData);
}


<?php

require_once '../config/database.php';
require_once 'functions.php';

function updateTeams($teamData) {
	global $conn;

	$sqlQuery = "
		UPDATE teams
		SET
			is_pro = :isPro,
			avatar = :avatar,
			player_name = :playerName,
			team_name = :teamName,
			shirt_image = :shirtImage,
			shield_image = :shieldImage,
			first_year = :firstYear
		WHERE
			id_team_cartola = :teamId
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

$teamsIds = file('idTeams.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$teamsData = getTeamsData($teamsIds);
updateTeams($teamsData);

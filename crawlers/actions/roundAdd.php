<?php

require_once '../../config/database.php';
require_once '../getData.php';

function addRound($teamData) {
	global $conn;

	$sqlQuery = "
        INSERT INTO rounds
        VALUES (
            DEFAULT,
            :roundId,
            :teamId,
            :captainId,
            :schemeId,
            :patrimony,
            :teamValue,
            :points,
            :championshipPoints
        )
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':roundId', $teamData['roundId']);
	$result->bindParam(':teamId', $teamData['teamId']);
	$result->bindParam(':captainId', $teamData['captainId']);
	$result->bindParam(':schemeId', $teamData['schemeId']);
	$result->bindParam(':patrimony', $teamData['patrimony']);
	$result->bindParam(':teamValue', $teamData['teamValue']);
	$result->bindParam(':points', $teamData['points']);
	$result->bindParam(':championshipPoints', $teamData['championshipPoints']);
	
	try {
		$result->execute();
	}
	catch(Exception $e) {
		echo 'Falha ao executar a operação:<br>' . $e->getMessage();
	}
}

$roundId = $_GET['roundId'];

// Nesta condição, fazer validação com os dados da API
// que retornam o início e fim de cada rodada, não entrando
// na condição caso a rodada já tenha se encerrado.
if(isset($roundId) && is_numeric($roundId)) {
    $teamsIds = file('../idTeams.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach($teamsIds as $teamId) {
        $teamData = getRoundData($teamId, $roundId);
        addRound($teamData);
    }
}
else {
    echo 'Rodada inválida.';
}


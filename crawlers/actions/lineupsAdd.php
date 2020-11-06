<?php

require_once '../../config/database.php';
require_once '../getData.php';

function addLineup($roundData) {
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
            :total
        )
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':roundId', $roundData['roundId']);
	$result->bindParam(':teamId', $roundData['teamId']);
	$result->bindParam(':captainId', $roundData['captainId']);
	$result->bindParam(':schemeId', $roundData['schemeId']);
	$result->bindParam(':patrimony', $roundData['patrimony']);
	$result->bindParam(':teamValue', $roundData['teamValue']);
	$result->bindParam(':points', $roundData['points']);
	$result->bindParam(':total', $roundData['total']);
	
	try {
		$result->execute();
        echo 'Rodada para o membro ' . $roundData['teamId'] . ' cadastrada com sucesso.<br>';
	}
	catch(Exception $e) {
		echo 'Falha ao cadastrar rodada para o membro ' . $roundData['teamId'] . '.<br>';
        // echo $e->getMessage();
	}
}

$roundId = $_GET['roundId'];

if(isset($roundId) && is_numeric($roundId)) {
    $members = file('../members-test.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach($members as $memberId) {
        $lineupData = getLineupData($memberId, $roundId);
        // addLineup($lineupData);

        
    }
}
else {
    echo 'Rodada inválida.';
}


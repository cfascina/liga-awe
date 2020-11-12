<?php

require_once '../../config/database.php';
require_once '../getData.php';

function addLineup($roundId, $memberId, $lineupData) {
	global $conn;

    foreach($lineupData as $athlete) {
        $sqlQuery = "
            INSERT INTO lineups
            VALUES (
                DEFAULT,
                :roundId,
                :memberId,
                :athleteId,
                :isCaptain,
                :positionId,
                :clubId,
                :price,
                :points,
                :variation
            )
        ";
        
        $isCaptain = $athlete['athleteId'] == $athlete['captainId'] ? 1 : 0;

        $result = $conn->prepare($sqlQuery);
        $result->bindParam(':roundId', $roundId);
        $result->bindParam(':memberId', $memberId);
        $result->bindParam(':athleteId', $athlete['athleteId']);
        $result->bindParam(':isCaptain', $isCaptain);
        $result->bindParam(':positionId', $athlete['positionId']);
        $result->bindParam(':clubId', $athlete['clubId']);
        $result->bindParam(':price', $athlete['price']);
        $result->bindParam(':points', $athlete['points']);
        $result->bindParam(':variation', $athlete['variation']);

        try {
            $result->execute();
            echo 'Escalação do membro ' . $memberId . ' cadastrada com sucesso.<br>';
        }
        catch(Exception $e) {

            echo $athlete['clubId'] . '<br>';
            echo 'Falha ao cadastrar escalação do membro ' . $memberId . '.<br>';
            echo $e->getMessage();
            die();
        }
    }
}

$roundId = $_GET['roundId'];

if(isset($roundId) && is_numeric($roundId)) {
    $members = file('../members.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach($members as $memberId) {
        $lineupData = getLineupData($roundId, $memberId);
        addLineup($roundId, $memberId, $lineupData);
    }
}
else {
    echo 'Rodada inválida.';
}


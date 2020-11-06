<?php

use function PHPSTORM_META\type;

require_once '../../config/database.php';
require_once '../getData.php';

function addLineup($lineupData) {
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
    
    foreach($lineupData as $athlete) {
        // ADD LINEUP ATHLETE.
        print_r($athlete);
        echo '<br>';
        
        
        // ADD LINEUP ATHLETE SCOUTS.
        if(!empty($athlete['scouts'])) {
            echo 'Add Scout!';
        }
        echo '<br><br>';
    }
	
	// $result = $conn->prepare($sqlQuery);
	// $result->bindParam(':roundId', $lineupData['roundId']);
	// $result->bindParam(':athleteId', $lineupData['athleteId']);
	// $result->bindParam(':clubId', $lineupData['clubId']);
	// $result->bindParam(':price', $lineupData['price']);
	// $result->bindParam(':points', $lineupData['points']);
	// $result->bindParam(':variation', $lineupData['variation']);
	// $result->bindParam(':scouts', $lineupData['scouts']);
	
	// try {
	// 	$result->execute();
    //     echo 'Escalação de ' . $lineupData['teamId'] . ' cadastrada com sucesso.<br>';
	// }
	// catch(Exception $e) {
	// 	echo 'Falha ao cadastrar escalação de ' . $lineupData['teamId'] . '.<br>';
    //     // echo $e->getMessage();
	// }
}

$roundId = $_GET['roundId'];

if(isset($roundId) && is_numeric($roundId)) {
    $members = file('../members-test.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach($members as $memberId) {
        $lineupData = getLineupData($memberId, $roundId);
        addLineup($lineupData);
    }
}
else {
    echo 'Rodada inválida.';
}


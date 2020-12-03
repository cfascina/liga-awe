<?php

require_once '../funcs.php';

$roundId = $_GET['roundId'];

if(isset($roundId) && is_numeric($roundId)) {
    $members = file('../members.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach($members as $memberId) {
        $roundData = getRoundData($memberId, $roundId);
        addRound($roundData);
    }
}
else {
    echo 'Rodada inválida.';
}


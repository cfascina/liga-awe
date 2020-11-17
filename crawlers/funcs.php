<?php

// Nested require
require_once '../../config/database.php';

function getApiData($url) {
	$options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER         => false,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING       => "",
		CURLOPT_USERAGENT      => "spider",
		CURLOPT_AUTOREFERER    => true,
		CURLOPT_CONNECTTIMEOUT => 120,
		CURLOPT_TIMEOUT        => 120,
		CURLOPT_MAXREDIRS      => 10,
		CURLOPT_SSL_VERIFYPEER => false
	);

	$ch = curl_init($url);
	curl_setopt_array($ch, $options);

	$content = curl_exec($ch);
	$err     = curl_errno($ch);
	$errmsg  = curl_error($ch);
	$header  = curl_getinfo($ch);
	curl_close($ch);

	$header['errno']   = $err;
	$header['errmsg']  = $errmsg;
	$header['content'] = $content;

	return $header;
}

// Clubs
function getClubsData() {
    $url = 'https://api.cartolafc.globo.com/clubes';
    $response = getApiData($url);
    $jsonData = json_decode($response['content'], true);

    $clubsArr = array();

    foreach($jsonData as $club) {
        $cartolaId = $club['id'];
        $name = $club['nome'];
        $abbreviation = $club['abreviacao'];
        $shield = $club['escudos']['60x60'];
        
        array_push(
            $clubsArr,
            array(
                'cartolaId' => $cartolaId,
                'name' => $name,
                'abbreviation' => $abbreviation,
                'shield' => $shield
            )
        );
    }

    return $clubsArr;
}

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
		echo 'Falha ao cadastrar clube ' . $clubData['name'] . '.<br>';
		// echo $e->getMessage();
	}
}

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
		echo 'Falha ao alterar clube ' . $clubData['name'] . '.<br>';
		// echo $e->getMessage();
	}
}

// Lineups
function getLineupData($roundId, $memberId) {
	$url = 'https://api.cartolafc.globo.com/time/id/' . $memberId . '/' . $roundId;
    $response = getApiData($url);
    $jsonData = json_decode($response['content'], true);

    $captainId = $jsonData['capitao_id'];
    $lineUpArr = array();
    
    foreach($jsonData['atletas'] as $athlete) {
        $athleteId = $athlete['atleta_id'];
        $positionId = $athlete['posicao_id'];
        $clubId = $athlete['clube_id'];
        $price = $athlete['preco_num'];
        $points = $athlete['pontos_num'];
        $variation = $athlete['variacao_num'];

        array_push(
            $lineUpArr,
            array(
                'athleteId' => $athleteId,
                'captainId' => $captainId,
                'positionId' => $positionId,
                'clubId' => $clubId,
                'price' => $price,
                'points' => $points,
                'variation' => $variation
            )
        );
    }

    return $lineUpArr;
}

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
            echo 'Falha ao cadastrar escalação do membro ' . $memberId . '.<br>';
            // echo $e->getMessage();
        }
    }
}

function deleteLineup($roundId, $memberId) {
	global $conn;

    $sqlQuery = "
        DELETE FROM lineups 
        WHERE 
            id_round = :roundId AND 
            id_member = :memberId
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':roundId', $roundId);
	$result->bindParam(':memberId', $memberId);

	try {
        $result->execute();
        echo 'Escalação do membro ' . $memberId . ' deletada com sucesso.<br>';
	}
	catch(Exception $e) {
        echo 'Falha ao deletar escalação do membro ' . $memberId . '.<br>';
		// echo $e->getMessage();
	}
}

// Members
function getMemberData($memberId) {
    $url = 'https://api.cartolafc.globo.com/time/id/' . $memberId;
    $response = getApiData($url);
    $jsonData = json_decode($response['content'], true);

    $name = $jsonData['time']['nome_cartola'];
    $team = $jsonData['time']['nome'];
    $avatar = $jsonData['time']['foto_perfil'];
    $shield = $jsonData['time']['url_escudo_svg'];
    $shirt = $jsonData['time']['url_camisa_svg'];
    $pro = intval($jsonData['time']['assinante']);
    $firstYear = $jsonData['time']['temporada_inicial'];

    return(
        array(
            'cartolaId' => $memberId,
            'name' => $name,
            'team' => $team,
            'avatar' => $avatar,
            'shield' => $shield,
            'shirt' => $shirt,
            'pro' => $pro,
            'firstYear' => $firstYear
        )
    );
}

function addMember($memberData) {
	global $conn;

	$sqlQuery = "
		INSERT INTO members
        VALUES (
            DEFAULT,
            :cartolaId,
			:name,
			:team,
			:avatar,
			:shield,
			:shirt,
			:pro,
            :firstYear
        ) 
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':cartolaId', $memberData['cartolaId']);
	$result->bindParam(':name', $memberData['name']);
	$result->bindParam(':team', $memberData['team']);
	$result->bindParam(':avatar', $memberData['avatar']);
	$result->bindParam(':shield', $memberData['shield']);
	$result->bindParam(':shirt', $memberData['shirt']);
	$result->bindParam(':pro', $memberData['pro']);
	$result->bindParam(':firstYear', $memberData['firstYear']);
	
	try {
		$result->execute();
		echo 'Membro ' . $memberData['name'] . ' cadastrado com sucesso.<br>';
	}
	catch(Exception $e) {
		echo 'Falha ao cadastrar membro ' . $memberData['name'] . '.<br>';
		// echo $e->getMessage();
	}
}

function updateMember($memberData) {
	global $conn;

	$sqlQuery = "
		UPDATE members
		SET
			name = :name,
			team = :team,
			avatar = :avatar,
			shield = :shield,
			shirt = :shirt,
			pro = :pro,
			first_year = :firstYear
		WHERE
			id_cartola = :cartolaId
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':cartolaId', $memberData['cartolaId']);
	$result->bindParam(':name', $memberData['name']);
	$result->bindParam(':team', $memberData['team']);
	$result->bindParam(':avatar', $memberData['avatar']);
	$result->bindParam(':shield', $memberData['shield']);
	$result->bindParam(':shirt', $memberData['shirt']);
	$result->bindParam(':pro', $memberData['pro']);
	$result->bindParam(':firstYear', $memberData['firstYear']);

	try {
		$result->execute();
		echo 'Membro ' . $memberData['name'] . ' alterado com sucesso.<br>';
	}
	catch(Exception $e) {
		echo 'Falha ao alterar membro ' . $memberData['name'] . '.<br>';
		// echo $e->getMessage();
	}
}

// Rounds
function getRoundData($memberId, $roundId) {
	$url = 'https://api.cartolafc.globo.com/time/id/' . $memberId . '/' . $roundId;
    $response = getApiData($url);
    $jsonData = json_decode($response['content'], true);

	$schemeId = $jsonData['esquema_id'];
	$patrimony = $jsonData['patrimonio'];
	$teamValue = $jsonData['valor_time'];
	$points = $jsonData['pontos'];
    $total = $jsonData['pontos_campeonato'];

    return(
        array(
			'roundId' => $roundId,
            'memberId' => $memberId,
			'schemeId' => $schemeId,
			'patrimony' => $patrimony,
			'teamValue' => $teamValue,
			'points' => $points,
			'total' => $total			
        )
    );
}

function addRound($roundData) {
	global $conn;

	$sqlQuery = "
        INSERT INTO rounds
        VALUES (
            DEFAULT,
            :roundId,
            :memberId,
            :schemeId,
            :patrimony,
            :teamValue,
            :points,
            :total
        )
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':roundId', $roundData['roundId']);
	$result->bindParam(':memberId', $roundData['memberId']);
	$result->bindParam(':schemeId', $roundData['schemeId']);
	$result->bindParam(':patrimony', $roundData['patrimony']);
	$result->bindParam(':teamValue', $roundData['teamValue']);
	$result->bindParam(':points', $roundData['points']);
	$result->bindParam(':total', $roundData['total']);
	
	try {
		$result->execute();
        echo 'Rodada ' . $roundData['roundId'] . ' do membro ' . $roundData['memberId'] . ' cadastrada com sucesso.<br>';
	}
	catch(Exception $e) {
		echo 'Falha ao cadastrar rodada ' . $roundData['roundId'] . ' para o membro ' . $roundData['memberId'] . '.<br>';
        // echo $e->getMessage();
	}
}

function updateRound($roundData) {
	global $conn;

	$sqlQuery = "
		UPDATE rounds
		SET
			id_scheme = :schemeId,
			patrimony = :patrimony,
			team_value = :teamValue,
			points = :points,
			total = :total
		WHERE
            id_round = :roundId AND
			id_member = :memberId
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':schemeId', $roundData['schemeId']);
	$result->bindParam(':patrimony', $roundData['patrimony']);
	$result->bindParam(':teamValue', $roundData['teamValue']);
	$result->bindParam(':points', $roundData['points']);
	$result->bindParam(':total', $roundData['total']);
	$result->bindParam(':roundId', $roundData['roundId']);
	$result->bindParam(':memberId', $roundData['memberId']);
	
	try {
		$result->execute();
        echo 'Rodada ' . $roundData['roundId'] . ' do membro ' . $roundData['memberId'] . ' atualizada com sucesso.<br>';
	}
	catch(Exception $e) {
		echo 'Falha ao atualizar rodada ' . $roundData['roundId'] . ' para o membro ' . $roundData['memberId'] . '.<br>';
        // echo $e->getMessage();
	}
}

<?php

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

// SEPARAR FUNÇÃO QUE PEGA ESCALAÇÃO DA FUNÇAÕ QUE PEGA OS SCOUTS
// DOS JOGADORES EM CADA ESCALAÇÃO, PARA OTIMIZAR A PERFORMANCE.
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

// PASSAR O 'captainId' PARA A FUNÇÃO 'getLineUpData'
function getRoundData($memberId, $roundId) {
	$url = 'https://api.cartolafc.globo.com/time/id/' . $memberId . '/' . $roundId;
    $response = getApiData($url);
    $jsonData = json_decode($response['content'], true);
	
	$captainId = $jsonData['capitao_id'];
	$schemeId = $jsonData['esquema_id'];
	$patrimony = $jsonData['patrimonio'];
	$teamValue = $jsonData['valor_time'];
	$points = $jsonData['pontos'];
    $total = $jsonData['pontos_campeonato'];

    return(
        array(
			'roundId' => $roundId,
            'teamId' => $memberId,
            'captainId' => $captainId,
			'schemeId' => $schemeId,
			'patrimony' => $patrimony,
			'teamValue' => $teamValue,
			'points' => $points,
			'total' => $total			
        )
    );
}

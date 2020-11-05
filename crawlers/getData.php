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

function getRoundData($teamId, $roundId) {
	$url = 'https://api.cartolafc.globo.com/time/id/' . $teamId . '/' . $roundId;
    $response = getApiData($url);
    $jsonData = json_decode($response['content'], true);
	
	$captainId = $jsonData['capitao_id'];
	$schemeId = $jsonData['esquema_id'];
	$patrimony = $jsonData['patrimonio'];
	$teamValue = $jsonData['valor_time'];
	$points = $jsonData['pontos'];
	$championshipPoints = $jsonData['pontos_campeonato'];

    return(
        array(
			'roundId' => $roundId,
            'teamId' => $teamId,
            'captainId' => $captainId,
			'schemeId' => $schemeId,
			'patrimony' => $patrimony,
			'teamValue' => $teamValue,
			'points' => $points,
			'championshipPoints' => $championshipPoints			
        )
    );
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
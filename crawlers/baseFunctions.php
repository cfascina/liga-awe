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

function getTeamData($teamId) {
    $url = 'https://api.cartolafc.globo.com/time/id/' . $teamId;
    $response = getApiData($url);
    $jsonData = json_decode($response['content'], true);

    $isPro = intval($jsonData['time']['assinante']);
    $avatar = $jsonData['time']['foto_perfil'];
    $playerName = $jsonData['time']['nome_cartola'];
    $teamName = $jsonData['time']['nome'];
    $shirtImage = $jsonData['time']['url_camisa_svg'];
    $shieldImage = $jsonData['time']['url_escudo_svg'];
    $firstYear = $jsonData['time']['temporada_inicial'];

    return(
        array(
            'teamId' => $teamId,
            'isPro' => $isPro,
            'avatar' => $avatar,
            'playerName' => $playerName,
            'teamName' => $teamName,
            'shirtImage' => $shirtImage,
            'shieldImage' => $shieldImage,
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
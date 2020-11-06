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

function getLineUpData($memberId, $roundId) {
	$url = 'https://api.cartolafc.globo.com/time/id/' . $memberId . '/' . $roundId;
    $response = getApiData($url);
    $jsonData = json_decode($response['content'], true);
    
    // TIRAR ESQUEMA DE ROUNDS E COLOCAR EM LINEUP
    // echo $jsonData['esquema'] . '<br>';

    $lineUpArr = array();

    foreach($jsonData['atletas'] as $athlete) {
        $athleteId = $athlete['atleta_id'];
        $clubId = $athlete['clube_id'];
        $price = $athlete['preco_num'];
        $points = $athlete['pontos_num'];
        $variation = $athlete['variacao_num'];
        
        $scoutsArr = array();
        foreach($athlete['scout'] as $scout => $quantity) { 
            array_push($scoutsArr[$scout] = $quantity);
        }

        array_push(
            $lineUpArr,
            array(
                'roundId' => $roundId,
                'athleteId' => $athleteId,
                'clubId' => $clubId,
                'price' => $price,
                'points' => $points,
                'variation' => $variation,
                'scouts' => $scoutsArr
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

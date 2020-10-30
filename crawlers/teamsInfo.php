<?php

require_once '../config/database.php';

function getApiInfo($url) {
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

function getTeamData($teamsIds) {
	foreach($teamsIds as $teamId) {
		$url = "https://api.cartolafc.globo.com/time/id/" . $teamId;
		$response = getApiInfo($url);
		$jsonData = json_decode($response['content'], true);

		$isPro = intval($jsonData['time']['assinante']);
		$avatar = $jsonData['time']['foto_perfil'];
		$playerName = $jsonData['time']['nome_cartola'];
		$teamName = $jsonData['time']['nome'];
		$shirtImage = $jsonData['time']['url_camisa_svg'];
		$shieldImage = $jsonData['time']['url_escudo_svg'];
		$firstYear = $jsonData['time']['temporada_inicial'];

		addTeam(
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
}

function addTeam($teamData) {
	global $conn;

	// echo $teamData['teamId'];

	$sqlQuery = "
		INSERT INTO players
		VALUES (
			DEFAULT,
			:teamId,
			:isPro,
			:avatar,
			:playerName,
			:teamName,
			:shirtImage,
			:shieldImage,
			:firstYear
		)
	";
	
	$result = $conn->prepare($sqlQuery);
	$result->bindParam(':teamId', $teamData['teamId']);
	$result->bindParam(':isPro', $teamData['isPro']);
	$result->bindParam(':avatar', $teamData['avatar']);
	$result->bindParam(':playerName', $teamData['playerName']);
	$result->bindParam(':teamName', $teamData['teamName']);
	$result->bindParam(':shirtImage', $teamData['shirtImage']);
	$result->bindParam(':shieldImage', $teamData['shieldImage']);
	$result->bindParam(':firstYear', $teamData['firstYear']);
	// $result->debugDumpParams();

	// echo $sqlQuery . '<br>';
	// echo $teamData['teamId'] . '<br>';
	// echo $teamData['isPro'] . '<br>';
	// echo $teamData['avatar'] . '<br>';
	// echo $teamData['playerName'] . '<br>';
	// echo $teamData['teamName'] . '<br>';
	// echo $teamData['shirtImage'] . '<br>';
	// echo $teamData['shieldImage'] . '<br>';
	// echo $teamData['firstYear'] . '<br>';

	try {
		$result->execute();
	}
	catch (Exception $e) {
		echo 'Falha ao executar a operação:<br>' . $e->getMessage();
	}
}

$teamsIds = array(
	6126264,
	// 340663,
	// 13952016,
	// 1100348,
	// 6664717,
	// 23706,
	// 2648784,
	// 25676609,
	// 662584,
	// 25919221,
	// 178333,
	// 41084
);

getTeamData($teamsIds);


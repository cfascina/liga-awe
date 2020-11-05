<?php

require_once '../../config/database.php';
require_once '../baseFunctions.php';

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
		echo 'Falha ao alterar o membro ' . $memberData['name'] . '.<br>';
		// echo $e->getMessage();
	}
}

$members = file('../members.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach($members as $memberId) {
    $memberData = getMemberData($memberId);
    updateMember($memberData);
}

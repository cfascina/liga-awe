<?php

$host = "localhost";
$database = "liga_awe";
$username = "root";
$password = "root@123";

try {
	$conn = new PDO("mysql:host=" . $host . ";dbname=" . $database, $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
	echo "Falha ao conectar com o banco de dados: " . $e->getMessage();
}

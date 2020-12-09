<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liga AWE</title>
	<link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
	<?php require_once('partials/header.html'); ?>

	<div class="content index">
        <div class="info">
            <div class="total">
				<h1>Membros</h1>
				<span></span>
			</div>
            <div class="members-avg">
				<h1>Média</h1>
				<span></span>
            </div>
            <div class="points-higher">
				<h1>Maior Pontuação</h1>
				<span></span>
            </div>
            <div class="points-lowesr">
				<h1>Menor Pontuação</h1>
				<span></span>
            </div>
            
        </div>
	</div>

	<footer>
		Desenvolvido por <a href="http://www.caiofascina.com.br/" target="_blank">Caio Fascina</a>
	</footer>

	<script src="./assets/js/libs/jquery.min.js"></script>
    <script src="./assets/js/services/members.js"></script>
    <script>
        function setBoxMembersTotal(number) {
			$('.info .total span').append(number);
        }
        
        getTotal()
			.then(function(res) {
				setBoxMembersTotal(res.total);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});
    </script>
</body>

</html>
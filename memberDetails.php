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

	<div class="content member-details">
		<div class="profile">
			<div class="shield-wrap">
				<img class="shield" />
			</div>
			<div class="team"></div>
			<div class="name"></div>
		</div>

		<div class="summary">
			<div class="points-and-rounds">
				<h1>Pontuação</h1>
				<span></span>
			</div>
			<div class="average">
				<h1>Média</h1>
				<span></span>
			</div>
			<div class="patrimony">
				<h1>Patrimônio</h1>
				<span></span>
			</div>
		</div>

		<div class="chart points">
			<h1>Gráfico de Pontuação</h1>
			<canvas id="ctx-points"></canvas>
		</div>

		<div class="chart patrimony">
			<h1>Gráfico de Patrimônio</h1>
			<canvas id="ctx-patrimony"></canvas>
		</div>
	</div>

	<footer>
		Desenvolvido por <a href="http://www.caiofascina.com.br/" target="_blank">Caio Fascina</a>
	</footer>

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/libs/chart.min.js"></script>
	<script src="./assets/js/services/members.js"></script>
	<script src="./assets/js/memberCharts.js"></script>
	<script>
		$.urlParam = function(paramName) {
			let paramValue = new RegExp('[\?&]' + paramName + '=([^&#]*)').exec(window.location.href);

			return paramValue[1] || 0;
		}

		function setBoxPatrimony(average) {
			$('.summary .patrimony span').append(average.replace('.', ',') + ' cartoletas');
		}

		function setBoxPoints(points, rounds) {
			$('.summary .points-and-rounds span').append(
				points.replace('.', ',') + 
				' pontos em ' + rounds + ' rodadas'
			);
		}

		function setBoxPointsAverage(average) {
			$('.summary .average span').append(average.replace('.', ',') + ' pontos por rodada');
		}

		function setProfile(data) {
			let proStamp = data.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';
			
			$('.profile .shield-wrap img.shield').attr('src', data.shield);
			$('.profile .shield-wrap img.shield').after(proStamp);
			$('.profile .team').append(data.team);
			$('.profile .name').append(data.name + ' (Cartoleiro desde ' + data.first_year + ')');
		}

		getChartData($.urlParam('memberId'))
			.then(function(res) {
				splitChartData(res);
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getMember($.urlParam('memberId'))
			.then(function(res) {
				setProfile(res);
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});
		getPatrimony($.urlParam('memberId'))
			.then(function(res) {
				setBoxPatrimony(res.patrimony)
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});
		getPoints($.urlParam('memberId'))
			.then(function(res) {
				setBoxPoints(res.points, res.rounds)
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getPointsAverage($.urlParam('memberId'))
			.then(function(res) {
				setBoxPointsAverage(res.average)
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});
	</script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liga AWE</title>
	<link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
	<header>
		<h1>Liga AWE</h1>
		<span class="sep">|</span>
		<a href="members.php">Membros</a>
		<span class="sep">></span>
		<span class="current">Detalhes</span>
	</header>

	<div class="content member-details">
		<div class="profile">
			<div class="shield-wrap">
				<img class="shield" />
			</div>
			<div class="team"></div>
			<div class="name"></div>
		</div>

		<div class="summary">
			<div class="points">
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

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/libs/chart.min.js"></script>
	<script src="./assets/js/services/members.js"></script>
	<script src="./assets/js/memberCharts.js"></script>
	<script>
		$.urlParam = function(paramName) {
			let paramValue = new RegExp('[\?&]' + paramName + '=([^&#]*)').exec(window.location.href);

			return paramValue[1] || 0;
		}

		function setBoxAverage(average) {
			$('.summary .average span').append(average.replace('.', ',') + ' pontos por rodada');
		}

		function setBoxPoints(points, rounds) {
			$('.summary .points span').append(
				points.replace('.', ',') + 
				' pontos em ' + rounds + ' rodadas'
			);
		}
		
		function setProfile(data) {
			let proStamp = data.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';
			
			$('.profile .shield-wrap img.shield').attr('src', data.shield);
			$('.profile .shield-wrap img.shield').after(proStamp);
			$('.profile .team').append(data.team);
			$('.profile .name').append(data.name + ' (Cartoleiro desde ' + data.first_year + ')');
		}

		getChartData($.urlParam('id'))
			.then(function(res) {
				splitChartData(res);
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getMember($.urlParam('id'))
			.then(function(res) {
				setProfile(res);
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getPointsInfo($.urlParam('id'))
			.then(function(res) {
				setBoxPoints(res.points, res.rounds)
				setBoxAverage(res.average)
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});
	</script>
</body>

</html>